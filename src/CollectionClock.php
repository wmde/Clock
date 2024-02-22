<?php

namespace WMDE\Clock;

use DateTimeImmutable;
use OutOfBoundsException;

/**
 * Returns the first time from the collection for the first call to now(), etc.
 * Throws OutOfBoundsException if now() is called after the end of the collection has been reached.
 */
class CollectionClock implements Clock {

	private \Iterator $times;

	/**
	 * @param \Iterator<int, DateTimeImmutable>|array<int, DateTimeImmutable> $times
	 */
	public function __construct( \Iterator|array $times ) {
		$generator = static function () use ( $times ) {
			yield from $times;
		};

		$this->times = $generator();
	}

	public function now(): DateTimeImmutable {
		$time = $this->times->current();

		if ( !( $time instanceof DateTimeImmutable ) ) {
			throw new OutOfBoundsException( 'No more DateTimeImmutable available' );
		}

		$this->times->next();
		return $time;
	}

}
