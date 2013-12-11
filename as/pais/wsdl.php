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
     * @var array of paises
     */
    public $paises;

    /**
     * @var string
     */
    public $error;

}

class paises {

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $pais;

}

/**
 * @var array
 */
$classMap = array(
	'buscarpaisasentradas' => 'buscarpaisasentradas',
	'buscarpaisassalidas' => 'buscarpaisassalidas',
    'paises' => 'paises'
);

