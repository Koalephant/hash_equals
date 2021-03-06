<?php

class HashEqualsTest extends \PHPUnit_Framework_TestCase
{
	public function testProvider()
	{
		return array(
			array("same", "same", true),
			array("not1same", "not2same", false),
			array("short", "longer", false),
			array("longer", "short", false),
			array("", "notempty", false),
			array("notempty", "", false),
			array("", "", true),
		);
	}

	public function warningProvider()
	{
		return array(
			array(123, "NaN", true),
			array("NaN", 123, true),
			array(123, 123, true),
			array(null, "", true),
			array(null, 123, true),
			array(null, null, true),
		);
	}

	/**
	 * @dataProvider testProvider
	 */
	public function testHashEquals($knownString, $userString, $result)
	{
		$this->assertSame($result, hash_equals($knownString, $userString));
	}

	/**
	 * @expectedException PHPUnit_Framework_Error_Warning
	 * @dataProvider warningProvider
	 */
	public function testHashEqualsWarning($knownString, $userString, $result)
	{
		$this->assertSame($result, hash_equals($knownString, $userString));
	}
}
