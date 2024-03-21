<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use WMDE\Clock\CollectionClock;

#[CoversClass( CollectionClock::class )]
class CollectionClockTest extends TestCase {

	private bool $running;

	public function testGoesThroughArrayValues(): void {
		$clock = new CollectionClock(
			[
				new \DateTimeImmutable( '2017-01-01' ),
				new \DateTimeImmutable( '2018-01-01' ),
			]
		);

		$this->assertEquals( new \DateTimeImmutable( '2017-01-01' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-01' ), $clock->now() );

		$this->expectException( \OutOfBoundsException::class );
		$clock->now();
	}

	public function testUsesCollectionsLazily(): void {
		$this->running = true;
		$infiniteTimes = function () {
			$date = new \DateTimeImmutable( '2018-01-01' );

			while ( $this->running ) {
				yield $date;
				$date = $date->add( new \DateInterval( 'P1D' ) );
			}
		};

		$clock = new CollectionClock( $infiniteTimes() );

		$this->assertEquals( new \DateTimeImmutable( '2018-01-01' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-02' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-03' ), $clock->now() );

		$this->running = false;
	}

}
