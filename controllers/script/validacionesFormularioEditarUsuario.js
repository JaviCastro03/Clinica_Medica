let formularioE = document.getElementById("vistaEditarUsuario");
formularioE.addEventListener("submit", validarFormularioE, false);

function validarFormularioE(e) {
    let valido = true;
    let nombreE = document.getElementById("nombreE");
    let mensajenombreE = document.getElementById("mensajeError-nombreE");

    mensajenombreE.innerHTML = "";

    if (!nombreE.checkValidity()) {
        valido = false;

        if (nombreE.validity.patternMismatch) {
            mensajenombreE.innerHTML = "Introduce un nombre válido (debe comenzar por mayúscula)";
        }
        mensajenombreE.style.color="#363960";
        mensajenombreE.style.textAlign="left";

    }
    let apellidosE = document.getElementById("apellidosE");
    let mensajeadpellidosE = document.getElementById("mensajeError-apellidosE");

    mensajeadpellidosE.innerHTML = "";

    if (!apellidosE.checkValidity()) {
        valido = false;

        if (apellidosE.validity.patternMismatch) {
            mensajeadpellidosE.innerHTML = "Introduce apellidos válidos (comprueba mayúsculas)";
        }
        mensajeadpellidosE.style.color = "##363960";
        mensajeadpellidosE.style.textAlign = "left";
    }
    let telefonoE = document.getElementById("telefonoE");
    let mensajetelefonoE = document.getElementById("mensajeError-telefonoE");

    mensajetelefonoE.innerHTML = "";

    if (!telefonoE.checkValidity()) {
        valido = false;

        if (telefonoE.validity.patternMismatch) {
            mensajetelefonoE.innerHTML = "Introduce un teléfono válido";
        }
        mensajetelefonoE.style.color = "##363960";
        mensajetelefonoE.style.textAlign = "left";
    }
    let codE = document.getElementById("codigopostalE");
    let mensajecodE = document.getElementById("mensajeError-codigopostalE");

    mensajecodE.innerHTML = "";

    if (!codE.checkValidity()) {
        valido = false;
        if (codE.validity.patternMismatch) {
            mensajecodE.innerHTML = "Introduce un código postal válido";
        }
        mensajecodE.style.color = "#363960";
        mensajecodE.style.textAlign = "left";
    }

    let direccionE = document.getElementById("direccionE");
    let mensajeDireccionE = document.getElementById("mensajeError-direccionE");

    mensajeDireccionE.innerHTML = "";

    if (!direccionE.checkValidity()) {
        valido = false;

        if (direccionE.validity.valueMissing) {
            mensajeDireccionE.innerHTML = "La dirección no puede ser nula";
        }
        mensajeDireccionE.style.color = "#363960";
        mensajeDireccionE.style.textAlign = "left"
    }

    if (valido) {
        formularioE.submit();
    }
    else {
        e.preventDefault();
    }
}
