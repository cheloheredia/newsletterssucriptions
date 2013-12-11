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
class pais {

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
	* Esta funcion busca los paises que conicidan.
	*
	* @param string $input->pais cadena que buscar en paises
	* @return string $buscarpaisassalidas->error OK si no ocurrio ningun error
	*		  paises $buscarpaisassalidas->paises que contiene los paises que coincida
	*/
	public function buscarpaisas($input) {
		$res = new buscarpaisassalidas();
		$resdbs = $this->clientdbs->buscarpaisautosuggest(array('pais'=> $input->pais));
		if ($resdbs->error == 0) {
			$res->error = 'OK';
			for ($i = 0; $i < sizeof($resdbs->matriz); $i++) { 
				$res->paises[$i]->id = $resdbs->matriz[$i]->columnas[0];
				$res->paises[$i]->pais = $resdbs->matriz[$i]->columnas[1];
			}
		} else {
			$res->error = 'Hubo un error al mostrar los paises, favor vuelva a intentarlo';
		}
		return $res;
	}
}
$server = new SoapServer($asdir."/wsdl/pais.wsdl");
$server->setClass("pais");
$server->handle();

