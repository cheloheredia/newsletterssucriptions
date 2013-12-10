<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
class res {

    /**
     * @var int
     */
    public $res;

}

class resquery {

    /**
     * @var array of filas
     */
    public $matriz;

    /**
     * @var int
     */
    public $error;

}

class filas {

    /**
     * @var array of string
     */
    public $columnas;

}

class buscarrevistautosuggestentradas {

    /**
     * @var string
     */
    public $revista;

}

class buscarpaisautosuggestentradas {

    /**
     * @var string
     */
    public $pais;

}

class buscarcuidadautosuggestentradas {

    /**
     * @var int
     */
    public $pais;

    /**
     * @var string
     */
    public $cuidad;

}

class registrarprospectoentradas {

    /**
     * @var int
     */
    public $cuidad;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellido;

    /**
     * @var string
     */
    public $email;

}

class buscarprospectoentradas {

    /**
     * @var int
     */
    public $cuidad;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellido;

}

class actualizarprospectoentradas {

    /**
     * @var int
     */
    public $prospecto;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellido;

    /**
     * @var string
     */
    public $email;

    /**
     * @var int
     */
    public $cuidad;

}

class buscartsuscripcionentradas {

    /**
     * @var string
     */
    public $tipo;

}

class buscarsuscripcionentradas {

    /**
     * @var int
     */
    public $prospecto;

    /**
     * @var int
     */
    public $revista;

    /**
     * @var int
     */
    public $tipo;

}

/**
* @var array
*/
$classMap = array(
	'res' => 'res',
	'resquery' => 'resquery',
	'filas' => 'filas',
    'buscarrevistautosuggestentradas' => 'buscarrevistautosuggestentradas',
    'buscarpaisautosuggestentradas' => 'buscarpaisautosuggestentradas',
    'buscarcuidadautosuggestentradas' => 'buscarcuidadautosuggestentradas',
    'registrarprospectoentradas' => 'registrarprospectoentradas',
    'buscarprospectoentradas' => 'buscarprospectoentradas',
    'actualizarprospectoentradas' => 'actualizarprospectoentradas',
    'buscartsuscripcionentradas' => 'buscartsuscripcionentradas',
    'buscarsuscripcionentradas' => 'buscarsuscripcionentradas'
);

