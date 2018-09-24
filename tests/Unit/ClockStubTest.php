<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WMDE\Clock\ClockStub;

/**
 * @covers \WMDE\Clock\ClockStub
 */
class ClockStubTest extends TestCase {

	public function testNow() {
		$time = new \DateTimeImmutable();

		$this->assertEquals(
			$time,
			( new ClockStub( $time ) )->now()
		);
	}

}
