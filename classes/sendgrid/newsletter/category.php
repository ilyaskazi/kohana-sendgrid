<?php
/**
 * Sendgrid Newsletter Category API Object
 * 
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter_Category {

	/**
	 * @var string The name of the category
	 */
	public $name;

	/**
	 * Initializes new category object
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
