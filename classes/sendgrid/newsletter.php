<?php
/**
 * Sendgrid Newsletter API Object
 *
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter extends Sendgrid_Base
{

	const URL_NEWSLETTER_ADD_NEW = '.....';
	const URL_NEWSLETTER_GET = '.....';
	const URL_NEWSLETTER_ADD_SUBSCRIBER = '';
	const URL_NEWSLETTER_EDIT = '';
	const URL_CATEGORY_CREATE = 'http://sendgrid.com/api/newsletter/category/create';

	/**
	 * Adds a subscriber to a list
	 *
	 * @param Sendgrid_Newsletter_Subscriber
	 *
	 * @return bool Returns true or false
	 * @throws Sendgrid_Request_Exception
	 */
	public function add_subscriber(Sendgrid_Newsletter_Subscriber $subscriber)
	{

	}

	public function delete_subscriber_from_list()
	{

	}

	public function get_list_subscribers(Sendgrid_Newsletter_List $list)
	{

	}

	public function add_template(Sendgrid_Template $template)
	{

	}

	public function edit_template(Sendgrid_Template $template)
	{

	}

	public function get_template($identity)
	{

	}

	public function list_templates()
	{

	}

	public function delete_template($identity)
	{

	}

	public function add_category(Sendgrid_Newsletter_Category $category)
	{

	}

	public function attach_category(Sendgrid_Newsletter_Category $category, Sendgrid_Newsletter_Template $template)
	{

	}

	public function detach_category(Sendgrid_Newsletter_Category $category, Sendgrid_Newsletter_Template $template)
	{

	}

	public function list_categories()
	{

	}

	public function add_list(Sendgrid_Newsletter_List $list)
	{

	}

	public function edit_list(Sendgrid_Newsletter_List $list)
	{

	}

	public function get_list($name)
	{

	}

	public function delete_list($name)
	{

	}

	public function add_schedule(Sendgrid_Newsletter_Schedule $schedule)
	{

	}

	public function get_schedule($name)
	{

	}

	public function delete_schedule($name)
	{

	}

}
