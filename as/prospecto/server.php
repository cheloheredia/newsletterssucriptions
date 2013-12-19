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
class prospecto {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase prospecto.
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
	* Esta funcion registra un prospecto y una suscripcion.
	*
	* @param string $input->nombre nombre del prospecto
	* @param string $input->apellido apellido del prospecto
	* @param string $input->email email del prospecto
	* @param string $input->pais pais del prospecto
	* @param string $input->ciudad ciudad del prospecto
	* @param string $input->revista revista a la que se esta suscribiendo el prospecto
	* @return string $registrarparaportadasentradas->error OK si no ocurrio ningun error
	*/
	public function registrarparaportadas($input) {
		$res = new registrarparaportadasentradas();
		$fecha = date("Y-m-d H:i:s");
		$resdbs = $this->clientdbs->buscarpais(array('pais'=> $input->pais));
		if ($resdbs->error == 0) {
			$idpais = $resdbs->matriz[0]->columnas[0];
			$resdbs = $this->clientdbs->buscarcuidad(array('pais'=> $idpais, 'cuidad'=> $input->ciudad));
			if ($resdbs->error == 0) {
				$idciudad = $resdbs->matriz[0]->columnas[0];
				$resdbs = $this->clientdbs->buscarrevista(array('revista'=> $input->revista));
				if ($resdbs->error == 0) {
					$idrevista = $resdbs->matriz[0]->columnas[0];
					$resdbs = $this->clientdbs->buscarprospecto(array(
					                                            'nombre'=> $input->nombre,
					                                            'apellido'=> $input->apellido,
					                                            'cuidad'=> $idciudad));
					if ($resdbs->error == 1) {
						$resdbs = $this->clientdbs->registrarprospecto(array(
						                                               'nombre'=> $input->nombre,
						                                               'apellido'=> $input->apellido,
						                                               'email'=> $input->email,
						                                               'cuidad'=> $idciudad,
						                                               'fecha' => $fecha));
						if ($resdbs->res == 0) {
							$resdbs = $this->clientdbs->buscarprospecto(array(
							                                            'nombre'=> $input->nombre,
							                                            'apellido'=> $input->apellido,
							                                            'cuidad'=> $idciudad));
						} else {
							$res->error = 'Error al registrarlo como nuevo prospecto, favor vuelva a intentarlo';
							break;
						}
					}
					$idprospecto = $resdbs->matriz[0]->columnas[0];
					$resdbs = $this->clientdbs->buscartsuscripcion(array('tipo'=> 'NEWSLETTER'));
					if ($resdbs->error == 0) {
						$idtsuscripcion = $resdbs->matriz[0]->columnas[0];
						$resdbs = $this->clientdbs->buscarsuscripcion(array(
						                                              'revista'=> $idrevista,
						                                              'prospecto'=> $idprospecto,
						                                              'tipo'=> $idtsuscripcion));
						if ($resdbs->error == 0) {
							$res->error = 'Su suscripcion ya existe';
						} else {
							$resdbs = $this->clientdbs->insertarsuscripcion(array(
							                                                'revista'=> $idrevista,
							                                                'prospecto'=> $idprospecto,
							                                                'tipo'=> $idtsuscripcion,
							                                                'fecha' => $fecha));
							if ($resdbs->res == 0) {
								$res->error = 'OK';
							} else {
								$res->error = 'Error en el registro, favor vuelva a intentarlo';
							}
						}
					} else {
						$res->error = 'El tipo de suscripcion no existe';
					}
					
				} else {
					$res->error = 'La revista ingresada no existe';
				}
				
			} else {
				$res->error = 'La ciudad ingresada no existe';
			}
			
		} else {
			$res->error = 'El pais ingresado no existe';
		}		
		return $res;
	}
}
$server = new SoapServer($asdir."/wsdl/prospecto.wsdl");
$server->setClass("prospecto");
$server->handle();

