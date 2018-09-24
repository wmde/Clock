<?php

namespace WMDE\Clock;

class ClockTimeTeller implements TimeTeller {

	private $clock;
	private $dateFormat;

	/**
	 * @param Clock $clock
	 * @param string $dateFormat
	 */
	public function __construct( Clock $clock, $dateFormat ) {
		$this->clock = $clock;
		$this->dateFormat = $dateFormat;
	}

	/**
	 * @return string
	 */
	public function getTime() {
		return $this->clock->now()->format( $this->dateFormat );
	}

}