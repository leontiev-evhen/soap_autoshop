<?php
class Auto 
{
	private $model;

	public function __construct ()
	{
		$this->model = new Model();
	}

	public function getAuto ()
	{
		return json_encode($this->model->getAuto());
	}

	public function getAutoInfo ($id)
	{
		return json_encode($this->model->getAutoInfo($id));
	}

} 