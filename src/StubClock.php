<?php

namespace WMDE\Clock;

use DateTimeImmutable;

class StubClock implements Clock {

	private DateTimeImmutable $stubValue;

	public function __construct( DateTimeImmutable $stubValue ) {
		$this->stubValue = $stubValue;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function now(): DateTimeImmutable {
		return $this->stubValue;
	}

}
