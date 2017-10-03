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
		$data = $this->model->getAuto();
		if ($data)
		{
			$result = ['status' => true, 'auto' => $data, 'message' => 'getting auto was success'];
		}
		else
		{
			$result = ['status' => false, 'message' => 'failed get auto'];
		}
		
		return json_encode($result);
	}

	public function getModelAuto ()
	{
		$model = $this->model->getModelAuto();
		if ($model)
		{
			$result = ['status' => true, 'model' => $model, 'message' => 'getting model was success'];
		}
		else
		{
			$result = ['status' => false, 'message' => 'failed get model'];
		}
		
		return json_encode($result);
	}

	public function getAutoInfo ($id)
	{
		if (!empty($id)) 
		{
			$data = $this->model->getAutoInfo($id);
			if ($data)
			{
				$result = ['status' => true, 'auto' => $data, 'message' => 'getting auto was success'];
			}
			else
			{
				$result = ['status' => false, 'message' => 'failed get auto'];
			}
			
			return json_encode($result);
		}
		throw new SoapFault("Server","parameter id is required"); 
	}

	public function preOrderAuto ($data)
	{
		if (!empty($data)) 
		{
			$aData = json_decode($data);

			if ($this->model->preOrderAuto($aData))
			{
				$result = ['status' => true, 'message' => 'data received successfully'];
			}
			else
			{
				$result = ['status' => false, 'message' => 'error'];
			}
			
			return json_encode($result);
		}
		throw new SoapFault("Server","parameter data is required");  
	}

	public function filterAuto ($data)
	{
		if (!empty($data))
		{
			$dataDecode = json_decode($data);
			$aData = $this->model->filterAuto($dataDecode);

			if ($aData)
			{
				$result = ['status' => true, 'auto' => $aData, 'message' => 'filtering auto was success'];
			}
			else
			{
				$result = ['status' => false, 'message' => 'failed get auto'];
			}
			
			return json_encode($result);
		}
		throw new SoapFault("Server","parameter data is required");  
	}
} 