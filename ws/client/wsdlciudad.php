<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
class buscarciudadesentradas {

    /**
     * @var string
     */
    public $ciudad;

    /**
     * @var string
     */
    public $pais;

}

class buscarciudadessalidas {

    /**
     * @var array of string
     */
    public $ciudades;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMapciudad'] = array(
	'buscarciudadesentradas' => 'buscarciudadesentradas',
    'buscarciudadessalidas' => 'buscarciudadessalidas'
);

