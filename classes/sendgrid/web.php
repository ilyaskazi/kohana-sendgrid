<?php
/**
 * Sendgrid Web API Object
 *
 * @package Sendgrid/Web
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Web extends Sendgrig_Base
{

	//Blocks URLs
	const URL_BLOCKS_GET = 'https://sendgrid.com/api/blocks.get';
	const URL_BLOCKS_DELETE = 'https://sendgrid.com/api/blocks.delete';

	//Bounces URLs
	const URL_BOUNCES_GET = 'https://sendgrid.com/api/bounces.get';
	const URL_BOUNCES_COUNT = 'https://sendgrid.com/api/bounces.count';
	const URL_BOUNCES_DELETE = 'https://sendgrid.com/api/bounces.delete';

	//Invalid Email URLs
	const URL_INVALID_EMAILS_GET = 'https://sendgrid.com/api/invalidemails.get';
	const URL_INVALID_EMAILS_DELETE = 'https://sendgrid.com/api/invalidemails.delete';

	//Spam Report URLs
	const URL_SPAM_GET = 'https://sendgrid.com/api/spamreports.get';
	const URL_SPAM_DELETE = 'https://sendgrid.com/api/spamreports.delete';

	//Statistics URLs


	//Unsubscribe URLs
	const URL_UNSUBSCRIBE_ADD = 'https://sendgrid.com/api/unsubscribes.add';
	const URL_UNSUBSCRIBE_GET = 'https://sendgrid.com/api/unsubscribes.get';
	const URL_UNSUBSCRIBE_DELETE = 'https://sendgrid.com/api/unsubscribes.delete';

	public function get_blocks($days = NULL, $start_date = NULL, $end_date = NULL, $get_date = TRUE)
	{
		$data = array();

		if($days !== NULL)
		{
			$data['days'] = $days;
		}

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($get_date === TRUE)
		{
			$data['date'] = 1;
		}

		return $this->_request->execute(self::URL_BLOCKS_GET, $data);
	}

	public function delete_blocks($email)
	{
		$data = array('email' => $email);

		return $this->_request->execute(self::URL_BLOCKS_DELETE, $data);
	}

	public function get_bounces($days = NULL, $start_date = NULL, $end_date = NULL,
			$get_date = TRUE, $limit = NULL, $offset = NULL, $type = NULL, $email = NULL)
	{
		$data = array();

		if($days !== NULL)
		{
			$data['days'] = $days;
		}

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($get_date === TRUE)
		{
			$data['date'] = 1;
		}

		if($limit !== NULL)
		{
			$data['limit'] = $limit;
		}

		if($offset !== NULL)
		{
			$data['offset'] = $offset;
		}

		if($type !== NULL)
		{
			$data['type'] = $type;
		}

		if($email !== NULL)
		{
			$data['email'] = $email;
		}

		return $this->_request->execute(self::URL_BOUNCES_GET, $data);
	}

	public function count_bounces($start_date = NULL, $end_date = NULL, $type = NULL)
	{
		$data = array();

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($type !== NULL)
		{
			$data['type'] = $type;
		}

		return $this->_request->execute(self::URL_BOUNCES_COUNT, $data);
	}

	public function delete_bounces($start_date = NULL, $end_date = NULL, $type = NULL, $email = NULL)
	{
		$data = array();

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($type !== NULL)
		{
			$data['type'] = $type;
		}

		if($email !== NULL)
		{
			$data['email'] = $email;
		}

		return $this->_request->execute(self::URL_BOUNCES_DELETE, $data);
	}

	public function get_invalid_emails($days = NULL, $start_date = NULL, $end_date = NULL,
			   	$get_date = TRUE, $limit = NULL, $offset = NULL, $type = NULL, $email = NULL)
	{
		$data = array();

		if($days !== NULL)
		{
			$data['days'] = $days;
		}

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($get_date === TRUE)
		{
			$data['date'] = 1;
		}

		if($limit !== NULL)
		{
			$data['limit'] = $limit;
		}

		if($offset !== NULL)
		{
			$data['offset'] = $offset;
		}

		if($type !== NULL)
		{
			$data['type'] = $type;
		}

		if($email !== NULL)
		{
			$data['email'] = $email;
		}

		return $this->_request->execute(self::URL_INVALID_EMAILS_GET, $data);
	}

	public function delete_invalid_emails($email)
	{
		$data = array('email' => $email);

		$this->_request->execute(self::URL_INVALID_EMAILS_DELETE, $data);
	}

	public function get_spam($days = NULL, $start_date = NULL, $end_date = NULL,
				$get_date = TRUE, $limit = NULL, $offset = NULL, $type = NULL, $email = NULL)
	{
		$data = array();

		if($days !== NULL)
		{
			$data['days'] = $days;
		}

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($get_date === TRUE)
		{
			$data['date'] = 1;
		}

		if($limit !== NULL)
		{
			$data['limit'] = $limit;
		}

		if($offset !== NULL)
		{
			$data['offset'] = $offset;
		}

		if($type !== NULL)
		{
			$data['type'] = $type;
		}

		if($email !== NULL)
		{
			$data['email'] = $email;
		}

		return $this->_request->execute(self::URL_SPAM_GET, $data);
	}

	public function delete_spam($email)
	{
		$data = array('email' => $email);

		$this->_request->execute(self::URL_SPAM_DELETE, $data);
	}

	public function add_unsubscribe($email)
	{
		$data = array('email' => $email);

		$this->_request->execute(self::URL_UNSUBSCRIBE_ADD, $data);
	}

	public function get_unsubscribes($days = NULL, $start_date = NULL, $end_date = NULL,
				$get_date = TRUE, $limit = NULL, $offset = NULL, $type = NULL, $email = NULL)
	{
		$data = array();

		if($days !== NULL)
		{
			$data['days'] = $days;
		}

		if($start_date == NULL)
		{
			$data['start_date'] = $start_date;
		}

		if($end_date !== NULL)
		{
			$data['end_date'] = $end_date;
		}

		if($get_date === TRUE)
		{
			$data['date'] = 1;
		}

		if($limit !== NULL)
		{
			$data['limit'] = $limit;
		}

		if($offset !== NULL)
		{
			$data['offset'] = $offset;
		}

		if($type !== NULL)
		{
			$data['type'] = $type;
		}

		if($email !== NULL)
		{
			$data['email'] = $email;
		}

		return $this->_request->execute(self::URL_UNSUBSCRIBE_GET, $data);
	}

	public function delete_unsubscribes($email)
	{
		$data = array('email' => $email);

		$this->_request->execute(self::URL_UNSUBSCRIBE_DELETE, $data);
	}
}
