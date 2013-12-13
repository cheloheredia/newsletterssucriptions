<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/

/**
 * @var string
 */
$criterio = strtolower($_GET["term"]);

/**
 * @var string
 */
$opt = $_GET['opt'];
include('ini.php');
if (!$criterio) return;
if (!$opt) return;
?>
[<?php
switch ($opt) {
    case 'pais':
        include('wsdlpais.php');
        $cliente = new SoapClient($paisdir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMappais']));
        $respuesta = $cliente->buscarpaisas(array('pais' => $criterio));
        if ($respuesta->error == 'OK') {
            for ($i = 0; $i < sizeof($respuesta->paises); $i++) { 
                $items[$respuesta->paises[$i]->pais] = $respuesta->paises[$i]->id;
            }
        } else {
            $items[$respuesta->error] = 0;
        }
        break;
    case 'ciudad':
        include('wsdlciudad.php');
        $cliente = new SoapClient($ciudaddir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapciudad']));
        $respuesta = $cliente->buscarciudades(array('pais' => $_GET['pais'], 'ciudad' => $criterio));
        if ($respuesta->error == 'OK') {
            for ($i = 0; $i < sizeof($respuesta->ciudades); $i++) { 
                $items[$respuesta->ciudades[$i]->ciudad] = $respuesta->ciudades[$i]->id;
            }
        } else {
            $items[$respuesta->error] = 0;
        }
        break;
    case 'revista':
        include('wsdlrevista.php');
        $cliente = new SoapClient($revistadir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMaprevista']));
        $respuesta = $cliente->buscarrevistas(array('revista' => $criterio));
        if ($respuesta->error == 'OK') {
            for ($i = 0; $i < sizeof($respuesta->revistas); $i++) { 
                $items[$respuesta->revistas[$i]->revista] = $respuesta->revistas[$i]->id;
            }
        } else {
            $items[$respuesta->error] = 0;
        }
        break;
    default:
        break;
}
$contador = 0;
foreach ($items as $item => $id) 
{
	if ($contador++ > 0) print ", ";
	print "{ \"label\" : \"$item\", \"value\" : { \"opt\" : \"$opt\", \"id\" : $id } }";
}
?>]

