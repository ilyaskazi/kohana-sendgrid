<?php

class Sendgrid_Request {

	const RESPONSE_FORMAT = 'XML'; // or JSON

	protected $_api_user;
	protected $_api_key;

	/**
	 * @var  Request  Kohana request
	 */
	protected $_request;

	public function __construct(array $config)
	{
		
	}

	public function execute($url, array $data)
	{
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
