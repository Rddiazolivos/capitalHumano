$(document).ready(function(){
    $(".lol").click(function(){
        var usuario = $('#usuarioActual').data("user");
        var boton = $(this).attr('id');
    	var estado = $('#campoFinalizar').attr("value");
    	//alert(boton);
    	if(boton == "finalizar"){            
    		$('#campoFinalizar').attr("value", 2);
    		$("#estadoTexto").html("<strong>Estado: </strong>Finalizada");
            if(usuario === 3){
                $('#btnModal').attr("data-target", "#modalReanuadar");
            }else{
                $('#btnModal').attr("data-target", "#modalEvaluador");
            }    		
    	}  	        
    	else if(boton == "pendiente"){
    		$('#campoFinalizar').attr("value", 1);
    		$("#estadoTexto").html("<strong>Estado: </strong>Pendiente");
            if(usuario === 3){
                $('#btnModal').attr("data-target", "#modalFinalizar");
            }else{
                $('#btnModal').attr("data-target", "#modalEvaluador");
            }
    	}  
        //var k = $(".estado").text();
        //alert(k); reanuadar
    });
    $("#estado_id").change(function(){
        $("#botonFiltro").click();
    });
});


var d = $('#data');
d.scrollTop(d.prop("scrollHeight"));