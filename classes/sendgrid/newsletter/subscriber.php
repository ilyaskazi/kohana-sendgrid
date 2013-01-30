<?php
/**
 * Sendgrid Newsletter Subscriber API Object
 *
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter_Subscriber {

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
	/*public function __construct(array $data = array())
	{
		$array = array();
		foreach ($data as $key => $val)
		{
			$array[$key] = $val;
		}

		$this->data[] = $array;
	}*/

	public function add($email, $name, array $additional = array())
	{
		$data = array(
			'email' => $email,
			'name' => $name,

		);

		foreach($additional as $key => $val)
		{
			$data[$key] = $val;
		}

		$this->data[] = json_encode($data);
	}
}
