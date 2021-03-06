/*
 * @author Marcelo Heredia
 * Dec, 2013
*/
$(function() 
{
    var $_GET = obtenerVariablesGet(document.location.search);
    if (typeof($_GET['revista']) != "undefined" && $_GET['revista'] !== null) {
        $("#revista").val($_GET['revista']);
        $("#revista").prop('disabled', true);
    }
    $("#regpros").change(function(){
        if($("#pais").val().length == 0) {
            $("#ciudad").prop('disabled', true);
        }
    });
    $("#regpros").submit(function () {
        var error = '';
        if($("#nombre").val().length < 1) {  
            error +="El nombre es obligatorio.\n";
        }
        if($("#apellido").val().length < 1) {  
            error +="El apellido es obligatorio.\n";
        }
        if($("#email").val().length < 1) {  
            error +="El email es obligatorio.\n";
        }
        if(esEmail($("#email").val()) == false) {  
            error +="El email no es valido.\n";
        }
        if($("#pais").val().length < 1) {  
            error +="El pais es obligatorio.\n";
        }
        if($("#ciudad").val().length < 1) {  
            error +="El ciudad es obligatorio.\n";
        }
        if($("#revista").val().length < 1) {  
            error +="El revista es obligatorio.\n";
        }
        if (error != '') {
            $("#respuesta").html(error);
        } else {
            $.ajax({
               type: "POST",
               url: clienteprospecto,
               data: $("#regpros").serialize(),
               success: function(data)
               {
                   $("#respuesta").html(data);
               }
            });
        }
        return false;  
    }); 
    $("#pais").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    opt : 'pais'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    $("#ciudad").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    pais : $("#pais").val(),
                    opt : 'ciudad'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    $("#revista").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    opt : 'revista'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
});
function itemMarcado(event, ui)
{
    var item = ui.item.label;
    switch(ui.item.value.opt){
        case 'pais':
            $("#pais").val(item);
            break;
        case 'ciudad':
            $("#ciudad").val(item);
            break;
        case 'revista':
            $("#revista").val(item);
            break;
    }
    event.preventDefault();
}
function itemSeleccionado(event, ui)
{
    var item = ui.item.label;
    switch(ui.item.value.opt){
        case 'pais':
            $("#pais").val(item);
            $("#ciudad").prop('disabled', false);
            break;
        case 'ciudad':
            $("#ciudad").val(item);
            break;
        case 'revista':
            $("#revista").val(item);
            break;
    }
    event.preventDefault();
}

