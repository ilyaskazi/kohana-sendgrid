<?php
/**
 * Sendgrid Response Class
 *
 * @package    Sendgrid
 * @author     Craig Sparks <craig@ad-vantagemedia.com>
 */

class Sendgrid_Response
{

	/**
	 * @var string    The response type
	 */
	protected $_response_format = 'JSON';

	/**
	 * @var null    The response error
	 */
	protected $_error = NULL;

	/**
	 * @var bool    If the response is a success
	 */
	protected $_success = FALSE;

	/**
	 * @var array Data returned from request
	 */
	protected $_data = array();

	/**
	 * Initializes a response object.
	 *
	 * @param $response string The response string received from a sendgrid request
	 * @param string $format string Either JSON or XML string
	 *
	 * @throws Sendgrid_Response_Exception
	 *
	 * @return void
	 */
	public function __construct($response, $format = 'JSON')
	{
		$this->_response_format = $format;

		if ($format == 'JSON')
		{
			//Parse JSON response
			$this->parse_json($response);
		}
		else if ($format == 'XML')
		{
			//Parse XML response
			$this->parse_xml($response);
		}
		else
		{
			//Unknown response format
			throw new Sendgrid_Response_Exception('Unsupported Response Format `:format`', array(':format' => $format));
		}
	}

	/**
	 * Parses a JSON response and sets the class properties based on response
	 *
	 * @param $response string The response string received from a sendgrid request
	 *
	 * @return void
	 */
	protected function parse_json($response)
	{
		$converted = json_decode($response);

		if (isset($converted->message) && $converted->message == 'success')
		{
			$this->_success = TRUE;
			$this->_data = (array)json_decode($converted);
		}

		if (isset($converted->error))
		{
			$this->_success = FALSE;
			$this->_error = $converted->error;
		}
	}

	/**
	 * Parses a XML response and sets the class properties based on response
	 *
	 * @param $response string The response string received from a sendgrid request
	 *
	 * @return void
	 */
	protected function parse_xml($response)
	{
		$converted = simplexml_load_string($response);

		if ($converted->message == 'success')
		{
			$this->_success = TRUE;
			$this->_data = (array)json_decode($converted);
		}
		else
		{
			$this->_success = FALSE;
			$this->_error = (string)$converted->error;
		}
	}

	/**
	 * Returns if the request has an error or not
	 *
	 * @return bool
	 */
	public function has_error()
	{
		return $this->_success ? FALSE : TRUE;
	}

	/**
	 * Returns the error string for request with a error response
	 *
	 * @return string
	 */
	public function get_error()
	{
		return $this->_error;
	}

	/**
	 * Returns response data
	 *
	 * @return array
	 */
	public function get_data()
	{
		return $this->_data;
	}
}