<?php
class App
{
	private $client;

	public function __construct ()
	{
		$this->client = new SoapClient(SOAP_URL); 
	}

	private function getAuto () 
	{
		return $this->client->getAuto();
	}

	private function getModelAuto () 
	{
		return $this->client->getModelAuto();
	}

	private function getAutoInfo ($id) 
	{
		return $this->client->getAutoInfo($id);
	}

	private function preOrderAuto ($data) 
	{
		return $this->client->preOrderAuto($data);
	}

	private function filterAuto ($data) 
	{
		return $this->client->filterAuto($data);
	}

	public function start ($post)
	{
		switch ($post['action']) 
		{
			case 'getAll':
				echo $this->getAuto();
				die();
				break;
			case 'getModel':
				echo $this->getModelAuto();
				die();
				break;
			case 'getAuto':
				$id = (int)$post['id'];
				echo $this->getAutoInfo($id);
				die();
				break;
			case 'addOrder':
				echo $this->preOrderAuto(json_encode($post));
				die();
				break;
			case 'filter':
				echo $this->filterAuto(json_encode($post));
				die();
				break;
		}
	}
}