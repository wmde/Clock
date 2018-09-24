<?php

namespace WMDE\Clock;

use DateTimeImmutable;

class StubClock implements Clock {

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