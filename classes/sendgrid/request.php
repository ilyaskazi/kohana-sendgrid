<?php

class Sendgrid_Request {

	const RESPONSE_FORMAT = 'XML'; // or JSON

	protected $_api_user;
	protected $_api_key;

	/**
	 * @var  Request  Kohana request
	 */
	protected $_request;

	/**
	 * Assigns the request parameter to the object, and config items to the object
	 *
	 * @throws Sendgrid_Request_Exception
	 *
	 * @param Request $request
	 * @param array $config
	 */
	public function __construct(Request $request, array $config)
	{
		//Assign request to property
		$this->_request = $request;

		//Check to ensure api_user is defined and not empty
		if(!array_key_exists('api_user',$config) || empty($config['api_user']))
		{
			throw new Sendgrid_Request_Exception('api_user config item is required.');
		}

		//Check to ensure api_key is defined and not empty
		if(!array_key_exists('api_key',$config) || empty($config['api_key']))
		{
			throw new Sendgrid_Request_Exception('api_key config item is required.');
		}

		//Assign the config values to object
		$this->_api_user = $config['api_user'];
		$this->_api_key = $config['api_key'];
	}

	protected function do_request($url,$data)
	{
		$ch = curl_init($url);


	}

	public function execute($url, array $data)
	{
		$url = $url.'.'.self::RESPONSE_FORMAT;

		$response = $this->_request::factory($url)->query($data);

		$response = $this->_request
				->post($data) // or something like that, not sure about method name
				->execute();

		$response = $response->body(); // or something like that, not sure about method name

		$status = parse_or_whatever($response);
		$message = parse_or_whatever($response);

		if ($status === 'error')
			throw new Sendgrid_Request_Exception($message);
	}

}
