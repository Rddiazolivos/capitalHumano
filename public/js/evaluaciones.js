$(document).ready(function(){

   $(".df").click(function(){   		
	    //alert(texto);
	    /*$.ajax({
		    url: 'evaluacion/datos', //this is your uri
		    type: 'GET', //this is your method
		    data: "match_id",
		    dataType: 'json',
		    success: function(response){
		    	$("#mostrar").append('<p>hello world</p>' + response.msg);
		    	$("#todo").html("<b>Hello world!</b>");
		    	alert(response.msg);
		    },
		    error: function(data){
	            console.log(data);
	            alert("fail" + ' ' + this.data)
	        },
		});*/
		var idProyecto = $(this).attr("id");
		$.getJSON("evaluacion/datos", { id:idProyecto }, function(result){	
			$("#todo").empty();		
        	$.each(result.asoc, function(i, field){
        	
        	if(field.status != 1){

	            $("#todo").append(
	            	"<div class='media'><div class='media-left'>" +
    				"<img src='img/img_avatar1.png' class='media-object' style='width:60px'>" +
					"  </div>" +
					"  <div class='media-body'>"+
					"    <h4 class='media-heading'>"+ field.nombre+" "+ field.ape_paterno+"</h4>" +
					"    <p><a href='evaluacion/"+field.id_user+"/"+result.proyecto_id+"' class='text-success'><span class='glyphicon glyphicon-education text-success'></span>Evaluar</a></p>" +
					"  </div>" +
					"</div>"
				);

        	}else{
        		$("#todo").append(
	            	"<div class='media'><div class='media-left'>" +
    				"<img src='img/img_avatar1.png' class='media-object' style='width:60px'>" +
					"  </div>" +
					"  <div class='media-body'>"+
					"    <h4 class='media-heading'>"+ field.nombre+" "+ field.ape_paterno+"</h4>" +
					"    <p><a href='evaluaciones/"+field.id+"/edit'><span class='glyphicon glyphicon-education'></span>Revisar</a></p>" +
					"  </div>" +
					"</div>"
				);
        	}

	        });
	        console.log(result.responsables);
	        console.log(result.asoc);
	    });
	});

});

$(document).ready(function(){
	$('.df').click(function(){
        $('.collapse.in').collapse('hide');
    });
});