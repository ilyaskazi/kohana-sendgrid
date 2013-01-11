<?php
/**
 * Sendgrid Newsletter API Object
 *
 * @package Sendgrid/Newsletter
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
class Sendgrid_Newsletter_Template
{

	public $identity = NULL;

	public $name = NULL;

	public $subject = NULL;

	public $text = NULL;

	public $html = NULL;

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
