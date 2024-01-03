//alertas
function login(valor = "") {
  switch (valor) {
    case "101":
      sessionStorage.setItem("alerta", "1");
      window.location.href = base_url + "productos";
      break;
    case "201":
      Swal.fire({
        title: "Alerta",
        text: "Su cuenta ha sido desactivada",
        icon: "warning",
      });
      break;
    case "102":
      sessionStorage.setItem("alerta", "2");
      window.location.href = base_url + "login/validarcuenta/";
      break;
    case "202":
      Swal.fire({
        title: "Datos Incorrectos",
        text: "Correo o contraseña incorrectas.",
        icon: "error",
      });
      break;
    case "203":
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

switch (sessionStorage.getItem("alerta")) {
  case "1":
    sessionStorage.removeItem("alerta");
    Toast.fire({
      icon: "success",
      title: "Bienvenido/a" + " " + nombreadmin,
    });
    break;
  case "2":
    sessionStorage.removeItem("alerta");
    Toast.fire({
      icon: "success",
      title: "Código enviado exitosamente"
    });
    break;
}

if(sessionStorage.getItem("verificacion") == "1"){
	sessionStorage.removeItem("verificacion");
    Toast.fire({
      icon: "success",
      title: "Cuenta Verificada Con Exito"
    });
}
if(sessionStorage.getItem("verificacion") == "2"){
	sessionStorage.removeItem("verificacion");
    Toast.fire({
      icon: "error",
      title: "Codigo inválido"
    });
}
