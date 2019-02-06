jQuery(function($) {
	let complemento = [];
	let check = [];
	$("#mostrarEntrada").hide();
 	mostrarComplemento();
	$(".valorCheck").on('click',function(){
		$("#mostrarEntrada").show();
	});	


	$("#agregarComplemento").click(function(){
		let datosComplemento = {complemento:$("#agregarTexto").val()}
		console.log("escritorio",datosComplemento);

		$.ajax({
	        url:location.origin + '/complementosws/guardar',
	        type:'post',
	        dataType:'json',
	        success:function(respuesta){
	           
	        },error: function(res) {
	            console.log(res);
	        },
	        data:{
	            "datosComplemento":datosComplemento
	        }
    	});

		$("#chebox").html("");
		 mostrarComplemento();
		 $("#agregarTexto").html('');
		 $("#mostrarEntrada").hide();
	});

	function mostrarComplemento(){
		$.ajax({
		        url:location.origin + '/complementosws/mostrar',
		        type:'post',
		        dataType:'json',
		        success:function(respuesta){
		        	console.log(respuesta)
		        	complemento = respuesta.out.otFm;
		        	console.log("com",complemento)
		        	if (complemento != undefined) {
		        		for (var i = 0; i < complemento.length; i++){
			        		$("#chebox").append('<input type="checkbox" class="comp" name="checks[]" value="'+complemento[i].complemento+'">'+complemento[i].complemento+'<br>');
			        		console.log(complemento[i]);
		        		}
		        	}else {
		        		$("#chebox").append('<h5>Sin complementos</h5>');
		        	}
		        	
		        },error: function(res) {
		            console.log(res);
		        },
		        data:{}
	    });
	}

	// $(document).ready(function(){
	// 	console.log("hola")
	// 	$('.comp').click(function(){
	// 	 var arr =	$('[name="checks[]"]:checked').map(function(){
	// 		return this.value;
	// 		}).get();
	// 		console.log(arr);
	// 		var check = arr.join(',');
	// 		console.log(check);
	// 	});
		
	// });

	$("#enviarDato").on("click",function(){
		console.log("enviando");
		if ($("#num_hab").val() != "" && $("#habitaciones option:selected").val() != "Seleccionar" &&  $("#precio_habitacion").val() !=  "") {
			guardarHabitacion();
			swal({
				type:"success",
				title:"Se agrego la habitación",
				showConfirmButton: true,
				confirmButtonText:"Aceptar",
				closeOnConfirm:true
			}).then((result)=>{
				if (result.value) {
					window.location = "habitacion";
				}
			});
		}else {
			swal({
				type:"warning",
				title:"Completa todos los campos",
				showConfirmButton: true,
				confirmButtonText:"Aceptar",
				closeOnConfirm:true
			});
		}
		
	});

	function guardarHabitacion(){
		$('input[type=checkbox]:checked').each(function(){
			var v = $(this).val();
			check.push(v);
			console.log(v);
		});
		let sinRepetidos = check.filter((valor, indiceActual, arreglo) => arreglo.indexOf(valor) === indiceActual);
		
		check = sinRepetidos;

		console.log(check);

		console.log("Guardar datos");
		let datohabitacion = {
			num:$("#num_hab").val(),
			habitacion:$("#habitaciones option:selected").val(),
			complementos: check,
			precio: $("#precio_habitacion").val()
		}
		console.log(datohabitacion);
		$.ajax({
			url:location.origin+"/habitacionws/guardar",
			type:"post",
			dataType:"json",
			success:function(){

			},error:function(res){
				console.log(res)
			},
			data:{"datohabitacion":datohabitacion}

		})
	}
	
})

