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
		return $this->model->getAuto();
	}

	public function getAutoInfo ($id)
	{
		return $this->model->getAutoInfo($id);
	}

} 