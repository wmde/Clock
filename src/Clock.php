<?php

namespace WMDE\Clock;

interface Clock {

	/**
	 * @return \DateTimeImmutable
	 */
	public function now();

}
