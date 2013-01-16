<?php

class Sendgrid_Request
{


	protected $_api_user;
	protected $_api_key;
	protected $_response_format = 'JSON';
	protected $_identity = NULL;

	/**
	 * @var  Sendgrid_Request_Factory  Kohana request
	 */
	protected $_request;

	/**
	 * Assigns the request parameter to the object, and config items to the object
	 *
	 * @throws Sendgrid_Request_Exception
	 *
	 * @param Sendgrid_Request_Factory $request
	 * @param array $config
	 */
	public function __construct(Sendgrid_Request_Factory $request, array $config)
	{
		//Assign request to property
		$this->_request = $request;

		//Check to ensure api_user is defined and not empty
		if (!array_key_exists('api_user', $config) || empty($config['api_user']))
		{
			throw new Sendgrid_Request_Exception('api_user config item is required.');
		}

		//Check to ensure api_key is defined and not empty
		if (!array_key_exists('api_key', $config) || empty($config['api_key']))
		{
			throw new Sendgrid_Request_Exception('api_key config item is required.');
		}

		//Check to ensure response format is defined and not empty
		if (!array_key_exists('response_format', $config) || empty($config['response_format']))
		{
			throw new Sendgrid_Request_Exception('response_format config item is required.');
		}

		//Check to ensure api_key is defined and not empty
		if (!array_key_exists('identity', $config) || empty($config['identity']))
		{
			throw new Sendgrid_Request_Exception('identity config item is required.');
		}

		//Assign the config values to object
		$this->_api_user = $config['api_user'];
		$this->_api_key = $config['api_key'];
		$this->_response_format = $config['response_format'];
		$this->_identity = $config['identity'];
	}

	public function get_identity()
	{
		return $this->_identity;
	}

	/**
	 * Executes a request to $url with $data passed as query variables
	 *
	 * @param $url
	 * @param array $data
	 *
	 * @throws Sendgrid_Request_Exception
	 */
	public function execute($url, array $data = array())
	{
		$url = $url . '.' . strtolower($this->_response_format);

		$request = $this->_request;

		$data = $data + array(
			'api_user' => $this->_api_user,
			'api_key' => $this->_api_key
		);

		try
		{
			$response = $request::create($url)
				->query($data)
				->execute();
		}
		catch (Sendgrid_Request_Exception $e)
		{
			//Need to figure how to handle this
		}

		return new Sendgrid_Response($response->body(), $this->_response_format);
	}

}
