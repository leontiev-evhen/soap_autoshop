<?php
class Model extends Sql
{
	private $connect;

    public function __construct ()
    {
        if (!$this->connect = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD))
        {
   			throw new Exception('Could not connect');
        }
    }

    public function getAuto ()
    {
    
    	$sql = $this->select([
    		'auto.id as ID',
    		'model.name as MODEL_NAME',
    		'mark.name as MARK_NAME'])
		->from('auto')
		->join('left', 'model', 'model.id = auto.model_id')
        ->join('left', 'mark', 'mark.id = model.mark_id')
        ->execute();
        $STH = $this->connect->query($sql);
        return $STH->fetchAll();
    }

	public function getAutoInfo ($id)
	{
    	$sql = $this->select([
    		'auto.id as ID',
    		'auto.color',
    		'auto.price',
    		'model.name as MODEL_NAME',
    		'model.year',
    	    'model.engine_capacity',
    	    'model.max_speed'])
		->from('auto')
		->join('left', 'model', 'model.id = auto.model_id')
		->where(['auto.id' => "<:id>"])
        ->execute();

        $sql = str_replace(["'<", ">'"], '', $sql);
        $STH = $this->connect->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $STH->execute(array(':id' => $id));
        return $STH->fetch();
	}



}