$(document).ready(function(){
    $(".lol").click(function(){
        var usuario = $('#usuarioActual').data("user");
        var boton = $(this).attr('id');
    	var estado = $('#campoFinalizar').attr("value");
    	//alert(boton);
    	if(boton == "finalizar"){
    		$('#campoFinalizar').attr("value", 2);
    		$("#estadoTexto").html("<strong>Estado: </strong>Finalizada");
            $('#btnModal').attr("data-target", "#modalReanuadar");
    	}
    	else if(boton == "pendiente"){
    		$('#campoFinalizar').attr("value", 1);
    		$("#estadoTexto").html("<strong>Estado: </strong>Pendiente");
            $('#btnModal').attr("data-target", "#modalFinalizar");
    	}
        //var k = $(".estado").text();
        //alert(k); reanuadar
    });
    //permite que al cambiar el select de estados, se busque de inmediato
    $("#estado_id").change(function(){
        $("#botonFiltro").click();
    });
});

$(document).ready(function() {
    //entrega la pripoedad multiselect a encargados
    $(".js-example-basic-multiple").select2({
        placeholder: "Selecciona un encargado",
        width: 'resolve'
    });
});

//deja al final los comentarios
var d = $('#data');
d.scrollTop(d.prop("scrollHeight"));

$(window).resize(function() {
  //determina el tamaño
    var aest = $("#xs-check").is(":visible");
    //alert(aest);
    if( aest ){
        $('.menu-desktop').hide();
        $('.menu-celular').show();
    }else{
        $('.menu-celular').hide();
        $('.menu-desktop').show();
    };

});

//para poder cambiar de color el menú
$(document).ready(function() {
    $(".menu .panel").hover(
        function() {
            //mouse over
            $(this).removeClass( "panel-default" ).addClass( "panel-primary" );
        }, function() {
            //mouse out
            $(this).removeClass( "panel-primary" ).addClass( "panel-default" );
        }
    );
});
