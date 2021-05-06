<?php

namespace WMDE\Clock;

use DateTimeImmutable;
use OutOfBoundsException;

/**
 * Returns the provided time on the first call to now().
 * Successive calls will return a time incremented by the specified interval.
 */
class IncrementingClock implements Clock {

	private $clock;

	/**
	 * @param DateTimeImmutable $startingTime Example: new \DateTimeImmutable( '2018-01-01' )
	 * @param \DateInterval $interval Example: new \DateInterval( 'P1Y' )
	 */
	public function __construct( DateTimeImmutable $startingTime, \DateInterval $interval ) {
		$infiniteTimes = function () use ( $startingTime, $interval ) {
			$date = $startingTime;

			while ( true ) {
				yield $date;
				$date = $date->add( $interval );
			}
		};

		$this->clock = new CollectionClock( $infiniteTimes() );
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function now() {
		return $this->clock->now();
	}

}
