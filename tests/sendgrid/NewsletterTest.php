<?php
/**
 * Sendgrid Newsletter API Object Test
 *
 * @package Sendgrid/Tests/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */

class Sendgrid_NewsletterTest extends PHPUnit_Framework_TestCase
{

	protected function mock_sendgrid_request()
	{
		return $this->getMockBuilder('Sendgrid_Request')
			->disableOriginalConstructor()
			->setMethods(array('execute')) // Methods we are going to mock
			->getMock();
	}

	/**
	 * Tests creating a new category
	 */
	public function test_create_category()
	{
		$data = array(
			'name' => 'cat1',
		);

		$sendgrid = $this->mock_sendgrid_request();

		$sendgrid
			->expects($this->once())
			->method('execute')
			->with(
				$this->equalTo(Sendgrid_Newsletter::URL_CATEGORY_CREATE),
				$this->equalTo($data)
			);

		$newsletter = new Sendgrid_Newsletter($sendgrid);

		$newsletter->add_category(new Sendgrid_Newsletter_Category(array('name' => 'cat1')));
	}

	/**
	 * Tests attaching a category to a newsletter
	 */
	public function test_attach_category()
	{

	}

	/**
	 * Tests detaching a category from a newsletter
	 */
	public function test_detach_category()
	{

	}

	/**
	 * Tests listing categories
	 */
	public function test_list_categories()
	{

	}
}
