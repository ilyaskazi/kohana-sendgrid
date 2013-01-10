<?php
/**
 * Sendgrid Newsletter List API Object
 * 
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter_List {

	/**
	 * @var string Name of the list
	 */
	public $name = NULL;

	/**
	 * @var string The column name that contains the name of the subscriber
	 */
	public $name_column = NULL;

	/**
	 * @var array Array of column names for list
	 */
	public $columns = array();

	/**
	 * Initializes a new List Object
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
