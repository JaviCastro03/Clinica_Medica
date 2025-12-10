
    let formulario = document.getElementById("vistaRegistro");
    formulario.addEventListener("submit", validarFormulario, false);

    function validarFormulario(e) {
    let esValido = true;

    //Validacion Dni
    let dni=document.getElementById("dni");
    let mensajeDni=document.getElementById("mensajeError-dni");
    mensajeDni.innerHTML="";
    dni.classList.remove("err");
    if(!dni.checkValidity()){
        esValido=false;
        dni.classList.add("err")
    if (dni.validity.valueMissing){
        mensajeDni.innerHTML="El campo dni es obligatorio";
    }else if(dni.validity.patternMismatch){
        mensajeDni.innerHTML="Introduce un DNI valido, comprueba que tenga 8 numeros y la letra sea mayuscula"
            }
        mensajeDni.style.color="red";
    }

    let nombre=document.getElementById("nombre");
    let mensajeNombre=document.getElementById("mensajeError-nombre");
    mensajeNombre.innerHTML="";
    nombre.classList.remove("err");
    if(!nombre.checkValidity()){
        esValido=false;
        nombre.classList.add("err")
    if (nombre.validity.valueMissing){
        mensajeNombre.innerHTML="El campo nombre es obligatorio";
}   else if(nombre.validity.patternMismatch){
        mensajeNombre.innerHTML="Introduce un nombre valido, comprueba que comience por mayusucla"
    }
        mensajeNombre.style.color="red";
    }

    let apellidos=document.getElementById("apellidos");
    let mensajeApellidos=document.getElementById("mensajeError-apellidos");
    mensajeApellidos.innerHTML="";
    apellidos.classList.remove("err");
    if(!apellidos.checkValidity()){
        esValido=false;
        apellidos.classList.add("err")
    if (apellidos.validity.valueMissing){
        mensajeApellidos.innerHTML="El campo apellidos es obligatorio";
    }else if(apellidos.validity.patternMismatch){
        mensajeApellidos.innerHTML="Introduce apellidos validos, comprueba que comiencen por mayusucla"
        }
        mensajeApellidos.style.color="red";
}

    let telefono=document.getElementById("telefono");
    let mensajetelefono=document.getElementById("mensajeError-telefono");
    mensajetelefono.innerHTML="";
    telefono.classList.remove("err");
    if(!telefono.checkValidity()){
        esValido=false;
        telefono.classList.add("err")
    if (telefono.validity.valueMissing){
        mensajetelefono.innerHTML="El campo telefono es obligatorio";
    }else if(telefono.validity.patternMismatch){
        mensajetelefono.innerHTML="Introduce un numero de telefono valido"
    }
    mensajetelefono.style.color="red";
    }

    let codP=document.getElementById("codigopostal");
    let mensajecodP=document.getElementById("mensajeError-codigopostal");
    mensajecodP.innerHTML="";
    codP.classList.remove("err");
    if(!codP.checkValidity()){
        esValido=false;
        codP.classList.add("err")
    if (codP.validity.valueMissing){
        mensajecodP.innerHTML="El campo Codigo Postal es obligatorio";
    }else if(codP.validity.patternMismatch){
        mensajecodP.innerHTML="Introduce un Codigo Postal valido"
    }
    mensajecodP.style.color="red";

    }

    let email=document.getElementById("email");
    let mensajeEmail=document.getElementById("mensajeError-email");
    mensajeEmail.innerHTML="";
    email.classList.remove("err");
    if(!email.checkValidity()){
        esValido=false;
        email.classList.add("err")
    if (email.validity.valueMissing){
        mensajeEmail.innerHTML="El campo Email es obligatorio";
}else if(email.validity.patternMismatch){
        mensajeEmail.innerHTML="Introduce un Email valido"
    }
        mensajeEmail.style.color="red";
    }

    let password=document.getElementById("password");
    let mensajePassword=document.getElementById("mensajeError-password");
    mensajePassword.innerHTML="";
    password.classList.remove("err");
    if(!password.checkValidity()){
        esValido=false;
        password.classList.add("err")
    if (password.validity.valueMissing){
        mensajePassword.innerHTML="El campo Contraseña es obligatorio";
    }else if(password.validity.patternMismatch){
        mensajePassword.innerHTML="Introduce una contraseña valida, asegurate de que contenga 8 caracteres con al menos una letra mayuscula, una minuscula y un caracter especial"
}
        mensajePassword.style.color="red";
    }

        let confirmPassword=document.getElementById("passwordConfirm");
        let mensajeConfirmPassword=document.getElementById("mensajeError-passwordConfirm");
        mensajeConfirmPassword.innerHTML="";
        confirmPassword.classList.remove("err");
        if(!confirmPassword.checkValidity()){
            esValido=false;
            confirmPassword.classList.add("err")
            if (confirmPassword.validity.valueMissing){
                mensajeConfirmPassword.innerHTML="El campo Contraseña es obligatorio";
            }
            mensajeConfirmPassword.style.color="red";
        }

        let direccion=document.getElementById("direccion");
        let mensajeDireccion=document.getElementById("mensajeError-direccion");
        mensajeDireccion.innerHTML="";
        direccion.classList.remove("err");
        if(!direccion.checkValidity()){
            esValido=false;
            direccion.classList.add("err")
            if (direccion.validity.valueMissing){
                mensajeDireccion.innerHTML="El campo Contraseña es obligatorio";
            }
            mensajeDireccion.style.color="red";
        }
    if (esValido) {
        formulario.submit();
    }
    else{
        e.preventDefault();
    }
}


