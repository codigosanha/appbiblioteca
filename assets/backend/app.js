$(document).ready(function(){
	$('.sidebar-menu').tree();


	$("#checkChangePassword").on("change", function(){
		$("#password").val(null);
		if($(this).prop('checked')) {
		    $(this).val("1");
		    
		    $("#password").removeAttr("disabled");
		    $("#password").attr("required","required");

		}else{
			$(this).val("0");
			$("#password").attr("disabled","disabled");
			$("#password").removeAttr("required");
		}
	});
	
	$('#telefono, #ejemplares, #dni').keypress(function (tecla) {
	  if (tecla.charCode < 48 || tecla.charCode > 57) return false;
	});
	$(document).on("click",".btn-eliminar", function(e){
		e.preventDefault();
		url = $(this).attr("href");
		swal({
		    title: "¿Desear cerrar sesión?",
		    text: "Si estas seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        cancelButtonClass: "btn-danger",
	        confirmButtonClass: "btn-success",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: true,
		},
		function(isConfirm){
		   	if (isConfirm){
		   		$.ajax({
					url: url,
					type:"POST",
					success: function(resp){
						location.reload(true);
					}
				});
		    } 
		});
		
	});
	$("#logout").on("click", function(e){
		e.preventDefault();
		swal({
		    title: "¿Desear cerrar sesión?",
		    text: "Si estas seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        cancelButtonClass: "btn-danger",
	        confirmButtonClass: "btn-success",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: true,
		},
		function(isConfirm){
		   	if (isConfirm){
		   		window.location.href= base_url + "auth/logout";
		    } 
		});
	});
	$("#datepicker").datepicker({
	    format: "yyyy",
	    viewMode: "years", 
	    minViewMode: "years"
	});
	$("#datepicker1").datepicker({
	    format: "mm-yyyy",
	    viewMode: "months", 
	    minViewMode: "months",
	    language: 'es'
	});

	$("#tipo_documento_id").on("change", function(){
		item = $("#tipo_documento_id option:selected").text().toLowerCase();
		num_documento = $("#num_documento").val();
	
		if (item=='dni') {
			$("#num_documento").val(num_documento.substr(0,8));
		}
	});
	
	$('input#num_documento').keypress(function (event) {
		item = $("#tipo_documento_id option:selected").text().toLowerCase();
		if (item=="dni") {
			cantidad = 8;
		} else{
			cantidad = 10;
		}
      	if (event.which < 48 || event.which > 57 || this.value.length === Number(cantidad)) {
        	return false;
      	}
    });
	
	$(document).on("click","#btn-comprobardni", function(){
		num_documento = $("#num_documento").val();
		if(num_documento==""){
			alertify.error("No ha ingresado ningun numero de documento");
		}
		else{

			$.ajax({
			  	type: "POST",
			  	url: base_url+"lectores/comprobardocumento",
			  	data: { num_documento: num_documento }
			}).done(function(msg) {
			    if (msg === "nf") {
			    	$("#nombres").val("");
			    	$("input[name=idLector]").val(null);
			    	alertify.error("El Lector no existe...haga clic boton Registrar para registrarlo");
			    }
			    else if (msg === "na") {
			    	$("#nombres").val("");
			    	$("input[name=idLector]").val(null);
			    	alertify.error("El Lector esta registrado...pero no esta disponible");
			    }
			    else{
			    	var result = JSON.parse(msg);
			    	$("input[name=idLector]").val(result.id);
			    	$("#nombres").val(result.nombres + " " +result.apellidos);
			    }
			});
		}

	});
	$(document).on("click", ".btn-select",function(){
    	codigo = $(this).closest("tr").find("td:eq(1)").text();
    	idLibro = $(this).val();
    	$("input[name=idLibro]").val(idLibro);
    	$("#codigo").val(codigo);
	});   
	$(document).on("click",".btn-eliminar-usuario",function(){
		idusuario = $(this).val();
		fila = $(this).closest("tr"); 
		swal({
		    title: "¿Ventana de Confirmación?",
		    text: "Si estas seguro de eliminar al usuario haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        cancelButtonClass: "btn-danger",
	        confirmButtonClass: "btn-success",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: true,
		},
		function(isConfirm){
		   	if (isConfirm){
		   		$.ajax({
		   			url: base_url + "usuarios/delete",
		   			type: "POST",
		   			data:{id:idusuario},
		   			success: function(resp){
		   				if (resp=="1") {
		   					location.reload(true);
		   				}
		   			}
		   		});
		   		
		    } 
		});
	});
	$("#tb-without-buttons").DataTable({
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
	}); 
});