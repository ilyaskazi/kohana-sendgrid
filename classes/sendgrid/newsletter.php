<?php
/**
 * Sendgrid Newsletter API Object
 *
 * This is the base class for newsletter API operations for SendGrid
 * http://sendgrid.com/docs/API_Reference/Newsletter_API/index.html
 *
 * This module supports all the features of the newsletter API with the exception
 * of sender addresses and a/b testing (variations) (although they may be added later)
 *
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter extends Sendgrid_Base
{
	//Newsletter URLs
	const URL_NEWSLETTER_ADD    = 'http://sendgrid.com/api/newsletter/add';
	const URL_NEWSLETTER_EDIT   = 'http://sendgrid.com/api/newsletter/edit';
	const URL_NEWSLETTER_GET    = 'http://sendgrid.com/api/newsletter/get';
	const URL_NEWSLETTERS_LIST  = 'http://sendgrid.com/api/newsletter/list';
	const URL_NEWSLETTER_DELETE = 'http://sendgrid.com/api/newsletter/delete';

	//Category URLs
	const URL_CATEGORY_CREATE   = 'http://sendgrid.com/api/newsletter/category/create';
	const URL_CATEGORY_ADD      = 'http://sendgrid.com/api/newsletter/category/add';
	const URL_CATEGORY_REMOVE   = 'http://sendgrid.com/api/newsletter/category/remove';
	const URL_CATEGORY_LIST     = 'http://sendgrid.com/api/newsletter/category/list';

	//List URLs
	const URL_LIST_ADD          = 'http://sendgrid.com/api/newsletter/lists/add';
	const URL_LIST_EDIT         = 'http://sendgrid.com/api/newsletter/lists/edit';
	const URL_LIST_GET          = 'http://sendgrid.com/api/newsletter/lists/get';
	const URL_LIST_DELETE       = 'http://sendgrid.com/api/newsletter/lists/delete';

	//Email URLs
	const URL_EMAIL_ADD         = 'http://sendgrid.com/api/newsletter/lists/email/add';
	const URL_EMAIL_GET         = 'http://sendgrid.com/api/newsletter/lists/email/get';
	const URL_EMAIL_DELETE      = 'http://sendgrid.com/api/newsletter/lists/email/delete';

	//Recipients URLs
	const URL_RECIPIENTS_ADD    = 'http://sendgrid.com/api/newsletter/recipients/add';
	const URL_RECIPIENTS_GET    = 'http://sendgrid.com/api/newsletter/recipients/get';
	const URL_RECIPIENTS_DELETE = 'http://sendgrid.com/api/newsletter/delete';

	//Schedule URLs
	const URL_SCHEDULE_ADD      = 'http://sendgrid.com/sendgrid.com/api/newsletter/schedule/add';
	const URL_SCHEDULE_GET      = 'http://sendgrid.com/api/newsletter/schedule/get';
	const URL_SCHEDULE_DELETE   = 'http://sendgrid.com/api/newsletter/schedule/delete';


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
