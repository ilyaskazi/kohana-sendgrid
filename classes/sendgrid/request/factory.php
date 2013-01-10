<?php
/**
 * Request factory to initialize kohana request object with url.  This object gets passed into
 * the Sendgrid_Request object so that urls can be assigned to request without specifically
 * initializing Kohana_Request inside of sendgrid objects.
 */

class Sendgrid_Request_Factory {

	/**
	 * Static method used to initialize a new request object
	 *
	 * @param $url
	 *
	 * @return Request|void
	 */
	public static function create($url)
	{
		return Request::factory($url);
	}
}