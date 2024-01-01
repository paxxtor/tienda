//Acción de botones
$(document).on("click", "#btnregistrarse", function () {
	window.location.href = "registrarse";
});

$(document).on("click", "#btniniciarsesion", function () {
	window.location.href = base_url + "login";
});

$(document).on("click", "#btnadminlogin", function () {
	window.location.href = base_url + "loginadmin";
});



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
			switch (data) {
				case "101":
					login(101);
					break;
				case "201":
					login(201);
					break;
				case "202":
					login(202);
					break;
				case "203":
					login(203);
					break;
			}
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
			switch (data) {
				case "101":
					login(101);
					break;
				case "201":
					login(201);
					break;
				case "202":
					login(202);
					break;
				case "203":
					login(203);
					break;
			}
		},
	});
}

