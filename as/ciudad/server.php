<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
require_once('wsdl.php');
require_once('../client/wsdldb.php');
require_once('../ini/ini.php');
class ciudad {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase ciudad.
	*/
	public function __construct(){
		$this->clientdbs = new SoapClient($GLOBALS['dbsdir'].'/wsdl/db.wsdl',
		                                 array('trace' => 1,
		                                       'cache_wsdl' => WSDL_CACHE_NONE,
		                                       'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
		                                       'classmap' => $GLOBALS['classMapdb']));
		//include_once '../client/excelPHP.php';
		//include_once '../client/mPDF.php';
		//include_once '../client/PHPMailer.php';
	}

	/**
	* Esta funcion busca las ciudades que conicidan.
	*
	* @param string $input->ciudad cadena que buscar en ciudades
	* @param string $input->ciudad pais al que pertenece la cuidad
	* @return string $buscarciudadesentradas->error OK si no ocurrio ningun error
	*		  cuidades $buscarciudadesentradas->ciudades que contiene las ciudades que coincidan
	*/
	public function buscarciudades($input) {
		$res = new buscarciudadesentradas();
		$resdbs = $this->clientdbs->buscarpais(array('pais'=> $input->pais));
		if ($resdbs->error == 0) {
			$idpais = $resdbs->matriz[0]->columnas[0];
			$resdbs = $this->clientdbs->buscarcuidad(array('pais'=> $idpais, 'cuidad'=> $input->ciudad));
			if ($resdbs->error == 0) {
				$res->error = 'OK';
				for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
					$res->ciudades[$i] = $resdbs->matriz[$i]->columnas[1];
				}
			} else {
				$res->error = 'No existen coincidencias';
			}	
		} else {
			$res->error = 'El pais ingresado no existe';
		}		
		return $res;
	}
}
$server = new SoapServer($asdir."/wsdl/ciudad.wsdl");
$server->setClass("ciudad");
$server->handle();

