<?php

namespace WMDE\Clock;

class StubTimeTeller implements TimeTeller {

	private $stubValue;

	/**
	 * @param string $stubValue
	 */
	public function __construct( $stubValue ) {
		$this->stubValue = $stubValue;
	}

	public function getTime() {
		return $this->stubValue;
	}

}
