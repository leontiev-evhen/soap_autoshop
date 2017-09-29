<?php
require_once 'config.php'; 

spl_autoload_register(function ($class_name) 
{
    require_once 'backend/'.$class_name . '.php';
});

try 
{
	//header("Content-Type: text/json; charset=utf-8");
	ini_set("soap.wsdl_cache_enabled", "0");
	$client = new App();
	var_dump($client->start());


} 
catch (SoapFault $fault) 
{
    $error = "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}
catch (Exception $e) 
{ 
    $error = "Error: " . $e->getMessage();
}