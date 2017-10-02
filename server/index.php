<?php
require_once 'config.php'; 

spl_autoload_register(function ($class_name) 
{
    require_once 'libs/'.$class_name . '.php';
});
try 
{
	ini_set("soap.wsdl_cache_enabled", "0");
	$server = new SoapServer(WSDL_URL, array('cache_wsdl' => WSDL_CACHE_NONE));
	$server->setClass("Auto");
	$server->handle();
	// $data = ['model_id' => 3, 'year' => 2015];
	// $server = new Auto();
	// print_r($server->filterAuto(json_encode($data)));
} 
catch (SoapFault $fault) 
{
    $error = "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}
catch (Exception $e) 
{ 
    $error = "Error: " . $e->getMessage();
}

