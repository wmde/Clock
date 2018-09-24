<?php

namespace WMDE\Clock\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WMDE\Clock\StubClock;
use WMDE\Clock\StubTimeTeller;

/**
 * @covers \WMDE\Clock\StubTimeTeller
 */
class StubTimeTellerTest extends TestCase {

	public function testGetTime() {
		$time = 'such time';

		$this->assertEquals(
			$time,
			( new StubTimeTeller( $time ) )->getTime()
		);
	}

}
