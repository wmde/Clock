<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WMDE\Clock\StubClock;

/**
 * @covers \WMDE\Clock\StubClock
 */
class StubClockTest extends TestCase {

	public function testNow() {
		$time = new \DateTimeImmutable();

		$this->assertEquals(
			$time,
			( new StubClock( $time ) )->now()
		);
	}

}
