<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
class registrarparaportadasentradas {

    /**
     * @var string
     */
    public $ciudad;

    /**
     * @var string
     */
    public $pais;

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
     * @var string
     */
    public $revista;

}

class registrarparaportadassalidas {

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$classMap = array(
	'registrarparaportadasentradas' => 'registrarparaportadasentradas',
	'registrarparaportadassalidas' => 'registrarparaportadassalidas'
);

