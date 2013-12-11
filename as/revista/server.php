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
class revista {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase revista.
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
	* Esta funcion busca las revistas que conicidan.
	*
	* @param string $input->revista cadena que buscar en revistas
	* @return string $buscarrevistassalidas->error OK si no ocurrio ningun error
	*		  revistas $buscarrevistassalidas->revistas que contiene las revistas que coincidan
	*/
	public function buscarrevistas($input) {
		$res = new buscarrevistassalidas();
		$resdbs = $this->clientdbs->buscarrevistautosuggest(array('revista'=> $input->revista));
		if ($resdbs->error == 0) {
			$res->error = 'OK';
			for ($i = 0; $i < sizeof($resdbs->matriz); $i++) { 
				$res->revistas[$i]->id = $resdbs->matriz[$i]->columnas[0];
				$res->revistas[$i]->revista = $resdbs->matriz[$i]->columnas[1];
			}
		} else {
			$res->error = 'Hubo un error al mostrar las revistas, favor vuelva a intentarlo';
		}
		return $res;
	}
}
$server = new SoapServer($asdir."/wsdl/revista.wsdl");
$server->setClass("revista");
$server->handle();

