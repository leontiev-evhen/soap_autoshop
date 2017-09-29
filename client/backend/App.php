<?php
class App
{
	private $client;

	public function __construct ()
	{
		$this->client = new SoapClient(SOAP_URL); 
	}

	public function start () 
	{
		return json_decode($this->client->getAuto());
	}
}