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

//funciones usuario
function enviarregistro() {
	let datos = document.getElementById("formregistro");
	let form = new FormData(datos);
	$.ajax({
		type: "POST",
		url: base_url + "login/registrar/guardar",
		data: form,
		processData: false,
		contentType: false,
		success: function (data) {
			console.log(data);
			if(data == "102") window.location.href = base_url + "login/validarcuenta";
		},
	});
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

