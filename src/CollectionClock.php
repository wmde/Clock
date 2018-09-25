<?php

namespace WMDE\Clock;

use DateTimeImmutable;
use OutOfBoundsException;

class CollectionClock implements Clock {

	/**
	 * @var \Generator
	 */
	private $times;

	/**
	 * @param iterable|DateTimeImmutable[] $times
	 */
	public function __construct( /* iterable */ $times ) {
		$generator = function() use ( $times ) {
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