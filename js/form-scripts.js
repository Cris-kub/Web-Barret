$("#formulario_contacto").submit(function(event) {
    // cancels the form submission(
    console.log("estoy aqui");
    event.preventDefault();
    submitForm();
});

function submitForm() {
    // Initiate Variables With Form Content
    //console.log("dentro de formulario submitForm");
    console.log($("#Conacto_nombre").val());
    var name = $("#Conacto_nombre").val();
    var apellido = $("#Conacto_apellido").val();
    var email = $("#Conacto_email").val();
    var telefono = $("#Conacto_teléfono").val();
    var fecha = $("#Conacto_fecha").val();
    var ciudad = $("#Conacto_ciudad").val();
    var message = $("#Conacto_mensaje").val();
    var proteccion_da = $("#Conacto_datos").val();

    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "Conacto_nombre=" + name + "&Conacto_email=" + email + "&Conacto_mensaje=" + message + "&Conacto_apellido=" + apellido + "&Conacto_teléfono=" + telefono + "&Conacto_fecha=" + fecha + "&Conacto_ciudad=" + ciudad + "&Conacto_datos" + proteccion_da,
        success: function(text) {
            if (text == "success") {
                console.log("se envio");
                formSuccess();
            } else {
                console.log(text);
                formFailed(text);

            }
        }
    });
}

function formSuccess() {
    $("#msgSubmit").value = "Se a registrado su mensaje nos pondremos en contacto cuanto antes";
    $("#msgSubmit").removeClass("hidden");
}

function formFailed(text) {

    $("#msgSubmit").append(text);
    $("#msgSubmit").removeClass("hidden");
}


function submitMSG(valid, msg) {
    var msgClasses;
    if (valid) {
        msgClasses = "h3 text-center tada animated text-success";
    } else {
        msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}