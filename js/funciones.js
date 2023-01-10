function limpiar() {
    document.form.reset();
    document.form.id_u.focus();
}

function limpiarz() {
    document.form2.reset();
    document.form2.id_z.focus();
}
function limpiare() { //Funcion para limpiar campos en formulario especies (form3)
    document.form3.reset();
    document.form3.id_especie.focus();
}
function limpiara() { //Funcion para limpiar campos en formulario animales (form4)
    document.form4.reset();
    document.form4.id_animal.focus();
}
//validar campos vacios
function validar() {
    var form = document.form;
    if (form.id_u.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el codigo del Usuario",
            icon: "error",
        });
        form.id_u.value = "";
        form.id_u.focus();
        return false;
    }
    if (form.username.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el Nombre del Usuario",
            icon: "error",
        });
        form.username.value = "";
        form.username.focus();
        return false;
    }
    if (form.pass.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite la contraseña del Usuario",
            icon: "error",
        });
        form.pass.value = "";
        form.pass.focus();
        return false;
    }
    if (form.usertype.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el tipo de Usuario",
            icon: "error",
        });
        form.usertype.value = "";
        form.usertype.focus();
        return false;
    }

    if (form.respuesta1.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite la respuesta 1",
            icon: "error",
        });
        form.username.value = "";
        form.username.focus();
        return false;
    }

    if (form.respuesta2.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite la respuesta 2",
            icon: "error",
        });
        form.username.value = "";
        form.username.focus();
        return false;
    }






    //ejecutar el evento submit del formulario
    form.submit();
}

function mostrarContrasena() {
    var tipo = document.getElementById("pass");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function mostrarConclave() {
    var tipo = document.getElementById("confirm");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}



function mostrarRespuesta2() {
    var tipo = document.getElementById("respuesta2");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function mostrarRespuesta1() {
    var tipo = document.getElementById("respuesta1");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}


function eliminar(url) {
    Swal.fire({
        title: 'Esta seguro?',
        text: 'No se puede reversar la accion',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#DBDE0C',
        cancelButtonColor: '#DE190C',
        confirmButtonText: 'Si, eliminar registro'


    }).then((result) => {
        if (result.value) {
            window.location = url;
        }
    });




}

function validarz() {
    var form = document.form2;
    if (form2.id_z.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el codigo del Zoológico",
            icon: "error",
        });
        form2.id_z.value = "";
        form2.id_z.focus();
        return false;
    }
    if (form2.nombre.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el Nombre del Zoológico",
            icon: "error",
        });
        form2.nombre.value = "";
        form2.nombre.focus();
        return false;
    }
    if (form2.tam.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el tamaño del Zoológico",
            icon: "error",
        });
        form2.tam.value = "";
        form2.tam.focus();
        return false;
    }
    if (form2.pres_an.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el presupuesto anual del Zoológico",
            icon: "error",
        });
        form2.pres_an.value = "";
        form2.pres_an.focus();
        return false;
    }

    if (form2.id_pais.value == "Seleccione") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione un pais",
            icon: "error",
        });
        form2.id_pais.value = "";
        form2.id_pais.focus();
        return false;
    }

    if (form2.id_ciudad.value == "Seleccione") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione una ciudad",
            icon: "error",
        });
        form.id_ciudad.value = "";
        form.id_ciudad.focus();
        return false;
    }


    //ejecutar el evento submit del formulario
    form.submit();
}

function validare() { //Funcion para validar campos formulario especies (form3)
    var form = document.form3;
    if (form.id_especie.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el codigo de la especie",
            icon: "error",
        });
        form.id_especie.value = 0;
        form.id_especie.focus();
        return false;
    }
    if (form.nombre_cientifico.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el Nombre de la especie",
            icon: "error",
        });
        form.nombre_cientifico.value = "";
        form.nombre_cientifico.focus();
        return false;
    }
    if (form.id_estado_extincion_fk.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione el estado de extinción",
            icon: "error",
        });
        form.id_estado_extincion_fk.value = "";
        form.id_estado_extincion_fk.focus();
        return false;
    }
    if (form.id_nombre_vulgar_fk.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione el nombre vulgar",
            icon: "error",
        });
        form.id_nombre_vulgar_fk.value = "";
        form.id_nombre_vulgar_fk.focus();
        return false;
    }

    if (form.id_familia_fk.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione una familia",
            icon: "error",
        });
        form.id_familia_fk.value = "";
        form.id_familia_fk.focus();
        return false;
    }

    if (form.id_zoo_fk.value == "" ){
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione un Zoológico",
            icon: "error",
        });
        form.id_zoo_fk.value = "";
        form.id_zoo_fk.focus();
        return false;
    }

    //ejecutar el evento submit del formulario
    form.submit();
}

function validara() { //Funcion para validar campos formulario animales (form4)
    var form = document.form4;
    if (form.id_animal.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el codigo del animal",
            icon: "error",
        });
        form.id_animal.value = 0;
        form.id_animal.focus();
        return false;
    }
    if (form.fecha_nac.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Ingrese fecha de nacimiento",
            icon: "error",
        });
        form.fecha_nac.value = "";
        form.fecha_nac.focus();
        return false;
    }
    if (form.id_pais_origen_fk.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione el pais de origen",
            icon: "error",
        });
        form.id_pais_origen_fk.value = "";
        form.id_pais_origen_fk.focus();
        return false;
    }
    if (form.id_continente_fk.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione el continente",
            icon: "error",
        });
        form.id_continente_fk.value = "";
        form.id_continente_fk.focus();
        return false;
    }

    if (form.id_especie_fk.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione la especie",
            icon: "error",
        });
        form.id_especie_fk.value = "";
        form.id_especie_fk.focus();
        return false;
    }

    if (form.id_sexo_fk.value == "" ){
        Swal.fire({
            title: "ERROR!",
            text: "Seleccione el sexo",
            icon: "error",
        });
        form.id_sexo_fk.value = "";
        form.id_sexo_fk.focus();
        return false;
    }

    //ejecutar el evento submit del formulario
    form.submit();
}