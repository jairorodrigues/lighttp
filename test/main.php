<?php

date_default_timezone_set("America/Campo_Grande");

require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class LightHttpTest extends WebTestCase {

	private static $LIGHTTP_HOME = "http://lighttp";

	function testGetNoParamRoute() {
		$this->get($this->url('/index'));

		$this->assertResponse(200);
		$this->assertText('get index');
	}

	function testPostNoParamRoute() {
		$this->post($this->url('/index'));

		$this->assertResponse(200);
		$this->assertText('post index');
	}

	function testGetWithParamsRoute() {
		$this->get($this->url('/with-params?param1=valparam1&param2=valparam2'));

		$this->assertResponse(200);
		$this->assertText('get with-params');
		$this->assertText('valparam1');
		$this->assertText('valparam2');
	}

	function testPostWithParamsRoute() {
		$this->post($this->url('/with-params'), array(
			'param1' => 'valparam1',
			'param2' => 'valparam2'
		));

		$this->assertResponse(200);
		$this->assertText('post with-params');
		$this->assertText('valparam1');
		$this->assertText('valparam2');
	}

	function testGetWithUrlParamsRoutes() {
		$this->get($this->url('/with-url-params/farm/32/cows/1991?param1=valparam1'));

		$this->assertResponse(200);
		$this->assertText('get with-url-params');
		$this->assertText('1991'); // cow id
		$this->assertText('32'); // farm id
		$this->assertText('valparam1');
	}

	function testPostWithUrlParamsRoutesAndCreatedResponse() {
		$this->post($this->url('/with-url-params/farm/32/cows/1991'), array(
			'param1' => 'valparam1'
		));

		$this->assertResponse(201); // 201 Created
		$this->assertText('post with-url-params');
		$this->assertText('1991'); // cow id
		$this->assertText('32'); // farm id
		$this->assertText('valparam1');
	}

	function testPutWithUrlParamsRoutes() {
		$this->post($this->url('/with-url-params/farm/32/cows/1991'), array(
			'_method' => 'PUT',
			'param1' => 'valparam1'
		));

		$this->assertResponse(200);
		$this->assertText('put with-url-params');
		$this->assertText('1991'); // cow id
		$this->assertText('32'); // farm id
		$this->assertText('valparam1');
	}

	function testDeleteWithUrlParamsRoutes() {
		$this->post($this->url('/with-url-params/farm/32/cows/1991'), array(
			'_method' => 'DELETE'
		));

		$this->assertResponse(200);
		$this->assertText('delete with-url-params');
		$this->assertText('1991'); // cow id
		$this->assertText('32'); // farm id
	}

	function url($url) {
		return self::$LIGHTTP_HOME . $url;
	}
}
