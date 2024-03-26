<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use WMDE\Clock\IncrementingClock;

#[CoversClass( IncrementingClock::class )]
class IncrementingClockTest extends TestCase {

	public function testIncrementByOneDay(): void {
		$clock = new IncrementingClock(
			new \DateTimeImmutable( '2018-01-01' ),
			new \DateInterval( 'P1D' )
		);

		$this->assertEquals( new \DateTimeImmutable( '2018-01-01' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-02' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-03' ), $clock->now() );
	}

	public function testIncrementByOneYear(): void {
		$clock = new IncrementingClock(
			new \DateTimeImmutable( '2018-01-01' ),
			new \DateInterval( 'P1Y' )
		);

		$this->assertEquals( new \DateTimeImmutable( '2018-01-01' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2019-01-01' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2020-01-01' ), $clock->now() );
	}

}
