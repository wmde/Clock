<?php

namespace WMDE\Clock\Tests\Unit;

use DateTime;
use PHPUnit\Framework\TestCase;
use WMDE\Clock\ClockTimeTeller;
use WMDE\Clock\SystemClock;

/**
 * @covers \WMDE\Clock\ClockTimeTeller
 */
class ClockTimeTellerTest extends TestCase {

	public function testGetTimeWithYearFormat() {
		$clock = new ClockTimeTeller(
			new SystemClock(),
			'Y'
		);

		$this->assertRegExp(
			'/^\d{4}$/',
			$clock->getTime()
		);
	}

	public function testGetTimeWithRfc3339Format() {
		$clock = new ClockTimeTeller(
			new SystemClock(),
			DateTime::RFC3339_EXTENDED
		);

		$this->assertStringEndsWith(
			'+00:00',
			$clock->getTime()
		);
	}

}
