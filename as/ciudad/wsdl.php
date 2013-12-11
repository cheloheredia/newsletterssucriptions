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
     * @var array of ciudades
     */
    public $ciudades;

    /**
     * @var string
     */
    public $error;

}

class ciudades {

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $ciudad;

}

/**
 * @var array
 */
$classMap = array(
	'buscarciudadesentradas' => 'buscarciudadesentradas',
	'buscarciudadessalidas' => 'buscarciudadessalidas',
    'ciudades' => 'ciudades'
);

