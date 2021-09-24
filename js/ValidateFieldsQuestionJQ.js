var emailER_alumno = /^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$/;
var emailER_profesor = /^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/;
var email = $("#email").val();
var pregunta = $("#pregunta").val();
var right_answ = $("#right_answ").val();
var wrong_answ_1 = $("#wrong_answ_1").val();
var wrong_answ_2 = $("#wrong_answ_2").val();
var wrong_answ_3 = $("#wrong_answ_3").val();
var subject = $("#subject").val();

function validarform(){
    if(pregunta==""){
        alert("Pregunta vacia");
        return false;
    }
    if(email=="" || pregunta=="" || right_answ=="" || wrong_answ_1=="" || wrong_answ_2=="" || wrong_answ_3=="" || subject==""){
        alert("Campos vacíos");
        return false;
    } else {
        if (!emailER_alumno.test(email)){
            alert(email);
            return false;
        } else if (!emailER_profesor.test(email)){
            alert("Correo no valido 2");
            return false;
        }
    }
}

$(document).ready(function(){
    $('#bEnviar').click(function(){
        if(validarform()){
            alert("CORRECTO")
        }
    })
})