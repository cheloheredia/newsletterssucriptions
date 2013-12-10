<?php
include 'db/wsdl.php';
$cliente=new SoapClient('http://127.0.0.1:26/wsdl/db.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->insertarsuscripcion(array('tipo'=>1,'prospecto'=>1,'revista'=>2));
var_dump($respuesta);
?>