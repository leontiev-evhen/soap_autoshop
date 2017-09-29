<?php
require_once 'config.php'; 

spl_autoload_register(function ($class_name) 
{
    require_once 'libs/'.$class_name . '.php';
});
try 
{
	$server = new SoapServer(WSDL_URL, array('cache_wsdl' => WSDL_CACHE_NONE));
	$server->setClass("Auto");
	$server->handle();
} 
catch (SoapFault $fault) 
{
    $error = "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}
catch (Exception $e) 
{ 
    $error = "Error: " . $e->getMessage();
}

