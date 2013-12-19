<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
class buscarrevistasentradas {

    /**
     * @var string
     */
    public $revista;

}

class buscarrevistassalidas {

    /**
     * @var array of string
     */
    public $revistas;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMaprevista'] = array(
	'buscarrevistasentradas' => 'buscarrevistasentradas',
    'buscarrevistassalidas' => 'buscarrevistassalidas'
);

