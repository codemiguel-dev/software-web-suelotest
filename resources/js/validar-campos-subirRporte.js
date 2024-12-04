function validarcampossubireporte() {

    var titulo = document.getElementsByName("titulo")[0].value;
    var pdf = document.getElementsByName("pdf")[0].value;

    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if ((titulo == "") || (pdf == "")) {  //COMPRUEBA CAMPOS VACIOS
        alert("Los campos no pueden quedar vacios");
        return true;
    }


}