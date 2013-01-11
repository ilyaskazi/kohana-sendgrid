<?php
/**
 * Sendgrid Newsletter Schedule Object
 *
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter_Schedule
{
	public $newsletter = NULL;

	public $deliver_time = NULL;

	public $delivery_delay = NULL;

	public function __construct(array $data = array())
	{
		foreach ($data as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
}
