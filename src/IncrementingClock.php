<?php

namespace WMDE\Clock;

use DateTimeImmutable;

/**
 * Returns the provided time on the first call to now().
 * Successive calls will return a time incremented by the specified interval.
 */
class IncrementingClock implements Clock {

	private Clock $clock;
	private bool $isRunning;

	/**
	 * @param DateTimeImmutable $startingTime Example: new \DateTimeImmutable( '2018-01-01' )
	 * @param \DateInterval $interval Example: new \DateInterval( 'P1Y' )
	 */
	public function __construct( DateTimeImmutable $startingTime, \DateInterval $interval ) {
		$this->isRunning = true;
		$infiniteTimes = function () use ( $startingTime, $interval ): \Iterator {
			$date = $startingTime;

			while ( $this->isRunning ) {
				yield $date;
				$date = $date->add( $interval );
			}
		};

		$this->clock = new CollectionClock( $infiniteTimes() );
	}

	public function now(): DateTimeImmutable {
		return $this->clock->now();
	}

	public function __destruct() {
		$this->isRunning = false;
	}

}
