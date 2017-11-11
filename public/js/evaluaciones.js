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
        	$.each(result.responsables, function(i, field){

	            $("#todo").append(
	            	"<div class='media'><div class='media-left'>" +
    				"<img src='img/img_avatar1.png' class='media-object' style='width:60px'>" +
					"  </div>" +
					"  <div class='media-body'>"+
					"    <h4 class='media-heading'>"+ field.nombre+" "+ field.ape_paterno+"</h4>" +
					"    <p><a href='evaluacion/"+field.responsable_id+"/"+result.proyecto_id+"'><span class='glyphicon glyphicon-education'></span>Evaluar</a></p>" +
					"  </div>" +
					"</div>"
				);
	        });
	        console.log(result.responsables);
	    });
	});

});

$(document).ready(function(){
	$('.df').click(function(){
        $('.collapse.in').collapse('hide');
    });
});