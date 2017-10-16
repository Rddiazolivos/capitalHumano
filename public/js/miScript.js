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
        placeholder: "Selecciona un encargado"
    });
});

//deja al final los comentarios
var d = $('#data');
d.scrollTop(d.prop("scrollHeight"));