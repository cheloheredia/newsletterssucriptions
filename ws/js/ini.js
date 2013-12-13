/*
 * @author Marcelo Heredia
 * Dec, 2013
*/

/*
 * @var string
 */
var buscarautocompletes = 'client/buscarautocompletes.php';

/*
 * @var string
 */
var clienteprospecto = 'client/clienteprospecto.php';

function esEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
}

function obtenerVariablesGet(qs) {
    qs = qs.split("+").join(" ");
    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;
    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }
    return params;
}


