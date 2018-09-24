<?php

namespace WMDE\Clock;

interface TimeTeller {

	/**
	 * Returns the current time in string format.
	 *
	 * @return string
	 */
	public function getTime();

}