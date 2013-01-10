<?php
/**
 * Sendgrid Newsletter Subscriber API Object
 * 
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter_Subscriber {

	/**
	 * @var string Email of the subscriber
	 */
	public $email = NULL;

	/**
	 * @var array Array of columns with data for subscriber (i.e. array('name' => 'user name'))
	 */
	public $data = array();

	/**
	 * Initializes a new subscriber object
	 *
	 * @param array $data
	 *
	 * @return void
	 */
	public function __construct(array $data = array())
	{
		foreach($data as $key=>$val)
		{
			if(isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
}
