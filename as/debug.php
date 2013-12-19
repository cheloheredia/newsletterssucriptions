<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'prospecto/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/prospecto.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->registrarparaportadas(array('pais'=>'BOLIVIA','ciudad'=>'LA PAZ','nombre'=>'Paolo Marcelo','apellido'=>'Heredia Aguilar','email'=>'marceloherediaa@gmail.com','revista'=>'VANIDADES BOLIVIA'));
print_r ($respuesta);

