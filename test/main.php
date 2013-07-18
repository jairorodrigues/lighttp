<?php

require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class LightHttpTest extends WebTestCase {

	private static $LIGHTTP_HOME = "http://localhost/lighttp";

	function testGetRoutes() {
		$this->get($this->url('/products/food/32/peanuts?test=val-test&test2=val-test2'));
		$this->assertResponse(200);
		$this->assertText('peanuts');
		$this->assertText('32');
		$this->assertText('val-test');
		$this->assertText('val-test2');
	}
	
	function testPostRoutes() {
		$this->post($this->url('/products/food/32/peanuts'), array(
			'test' => 'val-test',
			'test2' => 'val-test2'
		));
		
		$this->assertResponse(200);
		$this->assertText('peanuts');
		$this->assertText('32');
		$this->assertText('val-test');
		$this->assertText('val-test2');
	}

	function url($url) {
		return self::$LIGHTTP_HOME . $url;
	}
}
