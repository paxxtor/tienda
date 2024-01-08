//Acción de botones
$(document).on("click", "#btnregistrarse", function () {
	window.location.href = "registrarse";
});

$(document).on("click", "#btniniciarsesion", function () {
	window.location.href = base_url + "login";
});

$(document).on("click", "#btnadminlogin", function () {
	window.location.href = base_url + "administrador";
});

function btnreenviocodigo(){
	$.ajax({
		type: 'GET',
		url: base_url+'login/enviarcodigo',
		success: function(data) {
			console.log(data);
			if(data == 102){
				Toast.fire({
					icon: "success",
					title: "Se ha enviado nuevamente el codigo"
				  });
			}
			else
			{
				window.location.href = base_url + "login";
			}
		}
	});
}

//funciones usuario
function enviar() {
	let datos = document.getElementById("formulario");
	var email = $('#emailusuario').val();
	var clave = $('#claveusuario').val();
	if(email.length == 0){
		Swal.fire({
			title: "Se requiere correo",
			text: "El correo es obligatorio",
			icon: "error",
		  });
		return;
	}
	else if(clave.length == 0) {
		Swal.fire({
			title: "Se requiere contraseña",
			text: "La contraseña es obligatoria",
			icon: "error",
		  });
		return;
	}
	let form = new FormData(datos);
	$.ajax({
		type: "POST",
		url: base_url + "login/verificar",
		data: form,
		processData: false,
		contentType: false,
		success: function (data) {
			console.log(data);
			login(data);
		},
	});
}

function validaremail(email){
	var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
	if(!pattern.test(email))
	{
	return false;
	}
	return true;
}

//funciones usuario
function enviarregistro() {
	let datos = document.getElementById("formregistro");
	let form = new FormData(datos);
	if(validaremail($('#correoregistro').val()))
	{
		$.ajax({
			type: "POST",
			url: base_url + "login/registrar/guardar",
			data: form,
			processData: false,
			contentType: false,
			success: function (data) {
				console.log(data);
				if(data == "102") {
					sessionStorage.setItem("alerta", "2");
					window.location.href = base_url + "login/validarcuenta";}
				if(data == "vacios"){
					Swal.fire({
						title: "Campos Vacios",
						text: "Debe de llenar todos los campos",
						icon: "warning",
					  });
				}
			},
		});
	}
	else{
		Swal.fire({
			title: "Correo invalido",
			text: "Ingrese un correo valido",
			icon: "error",
		  });
	}

}

//funciones administrador
function enviaradmin() {
	let datos = document.getElementById("formularioadmin");
	let form = new FormData(datos);
	$.ajax({
		type: "POST",
		url: base_url + "login/adminverificar",
		data: form,
		processData: false,
		contentType: false,
		success: function (data) {
			login(data);
		},
	});
}

function comprar() {
	let datos = document.getElementById("formcomprar");
	let form = new FormData(datos);
	$.ajax({
		type: "POST",
		url: base_url + "admin/ventas/comprar",
		data: form,
		processData: false,
		contentType: false,
		success: function (data) {
			console.log(data);
			if(data == '200'){
				sessionStorage.setItem("confirmacioncompra", "1");
				window.location.href = base_url;
			}
		},
	});
}

//funcion para la vistas
// var dataTable = $('#producto_data').DataTable({
//     "processing": true,
//     "serverSide": true,
//     "order": [],
//     "ajax": {
//         url: base_url+'admin/getTable',
//         type: "POST"
//     },

//     "columnDefs": [{
//         "targets": 0,
//         "orderable": false,
//     }, ],
//     "scrollX": true,
//     "scrollY": false,
//     className: "noWrapTd",
// });


$(document).ready(function() {
    $('.js-example-basic-single').select2({
		dropdownParent: $('#registrarProducto')
	});
});

$(document).ready(function(){ 
    tabla=$('#producto_data').dataTable({
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
        "ajax":{
            url: base_url+'admin/optabla/listar',
            type : "get",
            dataType : "json",
            error: function(e){
                console.log(e.responseText);	
            }
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 3,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		}
	}).DataTable();
});


