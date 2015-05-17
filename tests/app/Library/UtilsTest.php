<?php

use App\Library\Utils;

class UtilsTest extends TestCase {

	protected $utils;
	
	/**
	 * 
	 */
	public function setUp()
	{
		$this->utils = new Utils;
	}
	
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 * @dataProvider getCalculateShareParameters
	 */
	public function testCalculateShare($a, $b, $expected)
	{
		$actual = $this->utils->calculateShare($a, $b);
		
		$this->assertEquals($expected, $actual);
	}
	
	public function getCalculateShareParameters()
	{
		return [
			[0, 0, [0, 0]],
			[1, 0, [100, 0]],
			[0, 1, [0, 100]],
			[1, 1, [50, 50]],
			[2, 1, [66, 34]],
			[1, 2, [33, 67]],
			[1, 3, [25, 75]],
		];
	}

}
