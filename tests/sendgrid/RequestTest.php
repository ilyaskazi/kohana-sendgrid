<?php
/**
 * Sendgrid Request Object Test
 *
 * @package Sendgrid/Tests
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */

class Sendgrid_NewsletterTest extends PHPUnit_Framework_TestCase
{
	protected function mock_request()
	{
		// I'm using the mock builder (it's easier for me)
		// Since heavy shit is going on in the Request __constructor
		// I'll just "disable" it by using "disableOriginalConstructor"
		return $this->getMockBuilder('Request')
			->disableOriginalConstructor()
			->getMock();
	}

	public function test_required_properties_gets_assigned()
	{
		// This is basicaly just a test double that we need to pass as an argument.
		// We don't care about Request behaviour at this point.
		$request = $this->mock_request();

		$sendgrid_request = new Sendgrid_Request($request, array('api_user' => 'test', 'api_key' => '123456'));

		// Here we test if property gets assigned
		// Here I'll add fail message as well, so when this test gets failed, I'll know
		// which assertion failed
		$this->assertAttributeInstanceOf('Request', '_request', $sendgrid_request, 'Request should be set');
		$this->assertAttributeEquals('test', '_api_user', $sendgrid_request, 'API user should be set');
		$this->assertAttributeEquals('123456', '_api_key', $sendgrid_request, 'API key should be set');
	}
}