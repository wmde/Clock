<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use WMDE\Clock\StubClock;

#[CoversClass( StubClock::class )]
class StubClockTest extends TestCase {

	public function testNow(): void {
		$time = new \DateTimeImmutable();

		$this->assertEquals(
			$time,
			( new StubClock( $time ) )->now()
		);
	}

}
