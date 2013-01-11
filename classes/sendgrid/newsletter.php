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
	const URL_NEWSLETTER_ADD = 'http://sendgrid.com/api/newsletter/add';
	const URL_NEWSLETTER_EDIT = 'http://sendgrid.com/api/newsletter/edit';
	const URL_NEWSLETTER_GET = 'http://sendgrid.com/api/newsletter/get';
	const URL_NEWSLETTERS_LIST = 'http://sendgrid.com/api/newsletter/list';
	const URL_NEWSLETTER_DELETE = 'http://sendgrid.com/api/newsletter/delete';

	//Category URLs
	const URL_CATEGORY_CREATE = 'http://sendgrid.com/api/newsletter/category/create';
	const URL_CATEGORY_ADD = 'http://sendgrid.com/api/newsletter/category/add';
	const URL_CATEGORY_REMOVE = 'http://sendgrid.com/api/newsletter/category/remove';
	const URL_CATEGORY_LIST = 'http://sendgrid.com/api/newsletter/category/list';

	//List URLs
	const URL_LIST_ADD = 'http://sendgrid.com/api/newsletter/lists/add';
	const URL_LIST_EDIT = 'http://sendgrid.com/api/newsletter/lists/edit';
	const URL_LIST_GET = 'http://sendgrid.com/api/newsletter/lists/get';
	const URL_LIST_DELETE = 'http://sendgrid.com/api/newsletter/lists/delete';

	//Email URLs
	const URL_EMAIL_ADD = 'http://sendgrid.com/api/newsletter/lists/email/add';
	const URL_EMAIL_GET = 'http://sendgrid.com/api/newsletter/lists/email/get';
	const URL_EMAIL_DELETE = 'http://sendgrid.com/api/newsletter/lists/email/delete';

	//Recipients URLs
	const URL_RECIPIENTS_ADD = 'http://sendgrid.com/api/newsletter/recipients/add';
	const URL_RECIPIENTS_GET = 'http://sendgrid.com/api/newsletter/recipients/get';
	const URL_RECIPIENTS_DELETE = 'http://sendgrid.com/api/newsletter/delete';

	//Schedule URLs
	const URL_SCHEDULE_ADD = 'http://sendgrid.com/sendgrid.com/api/newsletter/schedule/add';
	const URL_SCHEDULE_GET = 'http://sendgrid.com/api/newsletter/schedule/get';
	const URL_SCHEDULE_DELETE = 'http://sendgrid.com/api/newsletter/schedule/delete';


	/**
	 * Adds a subscriber to a list
	 *
	 * @param array $subscribers Array of subscribers to add to the list
	 * @param Sendgrid_Newsletter_List $list List to add the subscribers to
	 *
	 * @return bool Returns true or false
	 * @throws Sendgrid_Request_Exception
	 */
	public function add_subscribers(array $subscribers, Sendgrid_Newsletter_List $list)
	{
		$subscriber_data = array();

		foreach ($subscribers as $subscriber)
		{
			$subscriber_data[] = $subscriber;
		}

		$data = array(
			'list' => $list->name,
			'data' => json_encode($subscriber_data)
		);

		return $this->_request->execute(self::URL_EMAIL_ADD, $data);
	}

	public function delete_subscribers_from_list(array $emails, $list_name)
	{
		$data = array(
			'list' => $list_name,
			'email' => $emails
		);

		return $this->_request->execute(self::URL_EMAIL_DELETE, $data);
	}

	public function get_list_subscribers($name = NULL)
	{
		$data = array();

		if ($name !== NULL)
		{
			$data['name'] = $name;
		}

		return $this->_request->execute(self::URL_LIST_GET, $data);
	}

	public function add_template(Sendgrid_Template $template)
	{
		$data = array(
			'identity' => $template->identity,
			'name' => $template->name,
			'subject' => $template->subject,
			'html' => $template->html,
			'text' => $template->text
		);

		return $this->_request->execute(self::URL_NEWSLETTER_ADD, $data);
	}

	public function edit_template(Sendgrid_Template $template, $new_name = NULL)
	{
		$data = array(
			'identity' => $template->identity,
			'name' => $template->name,
			'subject' => $template->subject,
			'html' => $template->html,
			'text' => $template->text
		);

		if ($new_name !== NULL)
		{
			$data['newname'] = $new_name;
		}

		return $this->_request->execute(self::URL_NEWSLETTER_EDIT, $data);
	}

	public function get_template($name)
	{
		$data = array(
			'name' => $name
		);

		return $this->_request->execute(self::URL_NEWSLETTER_GET, $data);
	}

	public function list_templates($name = NULL)
	{
		$data = array();

		if ($name !== NULL)
		{
			$data['name'] = $name;
		}

		return $this->_request->execute(self::URL_NEWSLETTERS_LIST, $data);
	}

	public function delete_template($name)
	{
		$data = array(
			'name' => $name
		);

		return $this->_request->execute(self::URL_NEWSLETTER_DELETE, $data);
	}

	/**
	 * Adds a new newsletter category
	 *
	 * @param Sendgrid_Newsletter_Category $category
	 *
	 * @return Sendgrid_Response
	 */
	public function add_category(Sendgrid_Newsletter_Category $category)
	{
		$data = array(
			'category' => $category->name
		);

		return $this->_request->execute(self::URL_CATEGORY_CREATE, $data);
	}

	public function attach_category($template_name, $category_name)
	{
		$data = array(
			'category' => $category_name,
			'name' => $template_name
		);

		$this->_request->execute(self::URL_CATEGORY_ADD, $data);
	}

	public function detach_category($template_name, $category_name = NULL)
	{
		$data = array(
			'name' => $template_name
		);

		$data['category'] = $category_name;

		$this->_request->execute(self::URL_CATEGORY_DELETE, $data);
	}

	public function list_categories()
	{
		return $this->_request->execute(self::URL_CATEGORY_LIST);
	}

	public function add_list(Sendgrid_Newsletter_List $list)
	{
		$columns = array();

		foreach ($list->columns as $column)
		{
			$columns[$column] = $column;
		}

		$data = array(
			'list' => $list->name,
			'name' => $list->name_column,
		);

		$data = $data + $columns;

		return $this->_request->execute(self::URL_LIST_ADD, $data);
	}

	public function edit_list($list, $new_name)
	{
		$data = array(
			'list' => $list,
			'newlist' => $new_name
		);

		return $this->_request->execute(self::URL_LIST_EDIT, $data);
	}

	public function get_list($name = NULL)
	{
		$data = array();

		if ($name !== NULL)
		{
			$data['list'] = $name;
		}

		return $this->_request->execute(self::URL_LIST_GET, $data);
	}

	public function delete_list($name)
	{
		$data['list'] = $name;

		return $this->_request->execute(self::URL_LIST_DELETE, $data);
	}

	public function add_schedule(Sendgrid_Newsletter_Schedule $schedule)
	{
		$data = array(
			'name' => $schedule->name,
		);

		if ($schedule->deliver_time !== NULL)
		{
			$data['at'] = $schedule->deliver_time;
		}

		if ($schedule->delivery_delay !== NULL)
		{
			$data['after'] = $schedule->delivery_delay;
		}

		return $this->_request->execute(self::URL_SCHEDULE_ADD, $data);
	}

	public function get_schedule($name)
	{
		$data = array(
			'name' => $name
		);

		return $this->_request->execute(self::URL_SCHEDULE_GET, $data);
	}

	public function delete_schedule($name)
	{
		$data = array(
			'name' => $name
		);

		return $this->_request->execute(self::URL_SCHEDULE_DELETE, $data);
	}

}
