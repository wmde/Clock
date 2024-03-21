<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use WMDE\Clock\SystemClock;

#[CoversClass( SystemClock::class )]
class SystemClockTest extends TestCase {

	public function testNow(): void {
		$this->assertGreaterThan( 1537753047, ( new SystemClock() )->now()->getTimestamp() );
	}

}
