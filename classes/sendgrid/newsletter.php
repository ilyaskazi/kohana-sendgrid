<?php
/**
 * Sendgrid Newsletter API Object
 *
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter extends Sendgrid_Base {

	const URL_NEWSLETTER_ADD_NEW = '.....';
	const URL_NEWSLETTER_GET = '.....';
	const URL_NEWSLETTER_ADD_SUBSCRIBER = '';

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

	public function add_newsletter(array $data)
	{
		$this->_request->execute(self::URL_NEWSLETTER_ADD_NEW, $data);
	}

	public function add_template(Sendgrid_Newsletter_Template $template)
	{

	}

}
