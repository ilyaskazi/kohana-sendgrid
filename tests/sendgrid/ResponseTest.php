<?php
/**
 * @package    Sendgrid
 * @category   Test
 * @author     Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_ResponseTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests that constructor throws a exception if a invalid format is specified
	 *
	 * @expectedException Sendgrid_Response_Exception
	 */
	public function test_invalid_format_throws_exception()
	{
		$object = new Sendgrid_Response('','INVALID');
	}

	/**
	 * Tests that a successful json response will be parsed correctly
	 */
	public function test_json_successful_response()
	{
		$response = '{"message": "success"}';

		$object = new Sendgrid_Response($response,'JSON');

		$this->assertSame(FALSE,$object->has_error());
	}

	/**
	 * Tests that a successful xml reponse will be parsed correctly
	 */
	public function test_xml_successful_response()
	{
		$response = "<?xml version='1.0' encoding='UTF-8'?><result><message>success</message></result>";

		$object = new Sendgrid_Response($response,'XML');

		$this->assertSame(FALSE,$object->has_error());
	}

	/**
	 * Tests that a error json response will be parsed correctly and the error will be returned by get_error
	 */
	public function test_json_error_response()
	{
		$response = '{"error": "error in category: category is required"}';

		$object = new Sendgrid_Response($response,'JSON');

		$this->assertSame(TRUE,$object->has_error());
		$this->assertSame('error in category: category is required',$object->get_error());
	}

	/**
	 * Tests that a error xml response will be parsed correctly and the error will be returned by get_error
	 */
	public function test_xml_error_response()
	{
		$response = "<?xml version='1.0' encoding='UTF-8'?><errors><error>error in category: category is required</error></errors>";

		$object = new Sendgrid_Response($response,'XML');

		$this->assertSame(TRUE,$object->has_error());
		$this->assertSame('error in category: category is required',$object->get_error());
	}
}