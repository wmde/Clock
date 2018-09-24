<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WMDE\Clock\SystemClock;

/**
 * @covers \WMDE\Clock\SystemClock
 */
class SystemClockTest extends TestCase {

	public function testNow() {
		$this->assertGreaterThan( 1537753047, ( new SystemClock() )->now()->getTimestamp() );
	}

}
