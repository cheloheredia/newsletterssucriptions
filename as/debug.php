<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'prospecto/wsdl.php';
$cliente=new SoapClient('http://127.0.0.1:24/wsdl/prospecto.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->registrarparaportadas(array('pais'=>'bolivia','ciudad'=>'la paz','nombre'=>'Paolo Marcelo','apellido'=>'Heredia Aguilar','email'=>'marceloherediaa@gmail.com','revista'=>'vanidades bolivia'));
var_dump ($respuesta);

