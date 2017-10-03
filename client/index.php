<?php
require_once 'config.php'; 

spl_autoload_register(function ($class_name) 
{
    require_once 'backend/'.$class_name . '.php';
});

try 
{

	header("Access-Control-Allow-Origin:*");
	ini_set("soap.wsdl_cache_enabled", "0");
	$client = new App();


	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$client->start($_POST);
	}
}
catch (SoapFault $fault) 
{
    $erros = "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
    echo json_encode(['status' => false, 'message' => $erros]);
    die;
}


require_once './template/index.html'; 