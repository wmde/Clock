<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WMDE\Clock\CollectionClock;
use WMDE\Clock\StubClock;

/**
 * @covers \WMDE\Clock\CollectionClock
 */
class CollectionClockTest extends TestCase {

	public function testGoesThroughArrayValues() {
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

	public function testUsesCollectionsLazily() {
		$infiniteTimes = function () {
			$date = new \DateTimeImmutable( '2018-01-01' );

			while ( true ) {
				yield $date;
				$date = $date->add( new \DateInterval( 'P1D' ) );
			}
		};

		$clock = new CollectionClock( $infiniteTimes() );

		$this->assertEquals( new \DateTimeImmutable( '2018-01-01' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-02' ), $clock->now() );
		$this->assertEquals( new \DateTimeImmutable( '2018-01-03' ), $clock->now() );
	}

}
