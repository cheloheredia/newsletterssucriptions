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
     * @var array of revistas
     */
    public $revistas;

    /**
     * @var string
     */
    public $error;

}

class revistas {

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $revista;

}

/**
 * @var array
 */
$GLOBALS['classMaprevista'] = array(
	'buscarrevistasentradas' => 'buscarrevistasentradas',
	'buscarrevistassalidas' => 'buscarrevistassalidas',
    'revistas' => 'revistas'
);

