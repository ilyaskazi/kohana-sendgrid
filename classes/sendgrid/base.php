<?php
/**
 * Sendgrid Base API Object
 *
 * @package Sendgrid
 * @author Craig Sparks <craig@ad-vantagemedia.com>
 */
abstract class Sendgrid_Base
{

	/**
	 * @var Sendgrid_Request
	 */
	protected $_request;

	public function __construct(Sendgrid_Request $request)
	{
		$this->_request = $request;
	}
}