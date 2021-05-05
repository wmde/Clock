<?php

namespace WMDE\Clock;

use DateTimeImmutable;

class SystemClock implements Clock {

	/**
	 * @return \DateTimeImmutable
	 */
	public function now() {
		return new DateTimeImmutable( 'now' );
	}

}
