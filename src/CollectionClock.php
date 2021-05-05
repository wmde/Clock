<?php

namespace WMDE\Clock;

use DateTimeImmutable;
use OutOfBoundsException;

/**
 * Returns the first time from the collection for the first call to now(), etc.
 * Throws OutOfBoundsException if now() is called after the end of the collection has been reached.
 */
class CollectionClock implements Clock {

	/**
	 * @var \Generator
	 */
	private $times;

	/**
	 * @param iterable|DateTimeImmutable[] $times
	 */
	public function __construct( $times ) {
		$generator = function () use ( $times ) {
			yield from $times;
		};

		$this->times = $generator();
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function now() {
		$time = $this->times->current();

		if ( !( $time instanceof DateTimeImmutable ) ) {
			throw new OutOfBoundsException( 'No more DateTimeImmutable available' );
		}

		$this->times->next();
		return $time;
	}

}
