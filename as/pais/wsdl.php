<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
class buscarpaisasentradas {

    /**
     * @var string
     */
    public $pais;

}

class buscarpaisassalidas {

    /**
     * @var array of string
     */
    public $paises;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$classMap = array(
	'buscarpaisasentradas' => 'buscarpaisasentradas',
	'buscarpaisassalidas' => 'buscarpaisassalidas'
);

