let formularioE = document.getElementById("vistaEditarUsuario");
formularioE.addEventListener("submit", validarFormularioE, false);

function validarFormularioE(e) {
    let valido = true;
    let nombreE = document.getElementById("nombreE");
    let mensajenombreE = document.getElementById("mensajeError-nombreE");

    mensajenombreE.innerHTML = "";
    nombreE.classList.remove("err");

    if (!nombreE.checkValidity()) {
        valido = false;
        nombreE.classList.add("err");

        if (nombreE.validity.patternMismatch) {
            mensajenombreE.innerHTML = "Introduce un nombre válido (debe comenzar por mayúscula)";
        }
        mensajenombreE.style.color = "red";
    }
    let apellidosE = document.getElementById("apellidosE");
    let mensajeadpellidosE = document.getElementById("mensajeError-apellidosE");

    mensajeadpellidosE.innerHTML = "";
    apellidosE.classList.remove("err");

    if (!apellidosE.checkValidity()) {
        valido = false;
        apellidosE.classList.add("err");

        if (apellidosE.validity.patternMismatch) {
            mensajeadpellidosE.innerHTML = "Introduce apellidos válidos (comprueba mayúsculas)";
        }
        mensajeadpellidosE.style.color = "red";
    }
    let telefonoE = document.getElementById("telefonoE");
    let mensajetelefonoE = document.getElementById("mensajeError-telefonoE");

    mensajetelefonoE.innerHTML = "";
    telefonoE.classList.remove("err");

    if (!telefonoE.checkValidity()) {
        valido = false;
        telefonoE.classList.add("err");

        if (telefonoE.validity.patternMismatch) {
            mensajetelefonoE.innerHTML = "Introduce un teléfono válido";
        }
        mensajetelefonoE.style.color = "red";
    }
    let codE = document.getElementById("codigopostalE");
    let mensajecodE = document.getElementById("mensajeError-codigopostalE");

    mensajecodE.innerHTML = "";
    codE.classList.remove("err");

    if (!codE.checkValidity()) {
        valido = false;
        codE.classList.add("err");
        if (codE.validity.patternMismatch) {
            mensajecodE.innerHTML = "Introduce un código postal válido";
        }
        mensajecodE.style.color = "red";
    }

    let direccionE = document.getElementById("direccionE");
    let mensajeDireccionE = document.getElementById("mensajeError-direccionE");

    mensajeDireccionE.innerHTML = "";
    direccionE.classList.remove("err");

    if (!direccionE.checkValidity()) {
        valido = false;
        direccionE.classList.add("err");

        if (direccionE.validity.valueMissing) {
            mensajeDireccionE.innerHTML = "La dirección no puede ser nula";
        }
        mensajeDireccionE.style.color = "red";
    }

    if (valido) {
        formularioE.submit();
    }
    else {
        e.preventDefault();
    }
}
