<?php
require_once 'config.php'; 
spl_autoload_register(function ($class_name) 
{
    require_once 'libs/'.$class_name . '.php';
});
try 
{
	$obj = new Auto();
	print_r($obj->getAutoInfo(1));


} 
catch (SoapFault $fault) 
{
    $error = "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}
catch (Exception $e) 
{ 
    $error = "Error: " . $e->getMessage();
}

