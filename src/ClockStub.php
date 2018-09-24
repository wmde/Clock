<?php

namespace WMDE\Clock;

use DateTimeImmutable;

class ClockStub implements Clock {

	private $stubValue;

	public function __construct( DateTimeImmutable $stubValue ) {
		$this->stubValue = $stubValue;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function now() {
		return $this->stubValue;
	}

}