//alertas
function login(valor = "") {
	switch (valor) {
		case 101:
      sessionStorage.setItem("alerta", "1");
      window.location.href = base_url + "login/vista/bienvenidausuario";
			break;
		case 201:
			console.log("No funciona");
			Swal.fire({
				title: "Alerta",
				text: "Su cuenta ha sido desactivada",
				icon: "warning",
			});
			break;
		case 202:
			Swal.fire({
				title: "Datos Incorrectos",
				text: "Correo o contraseña incorrectas.",
				icon: "error",
			});
			break;
		case 203:
			Swal.fire({
				title: "Atención",
				text: "Debe de colocar su correo y contraseña.",
				icon: "warning",
			});
			break;
		default:
			alert(`No se encontró el valor solicitado`);
	}
}

const Toast = Swal.mixin({
	toast: true,
	position: "top-end",
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
	didOpen: (toast) => {
		toast.onmouseenter = Swal.stopTimer;
		toast.onmouseleave = Swal.resumeTimer;
	},
});

if(sessionStorage.getItem("alerta") == "1"){
    sessionStorage.removeItem("alerta")
    Toast.fire({
      icon: "success",
      title: "Bienvenido/a" + " " + nombreadmin
    });
}


