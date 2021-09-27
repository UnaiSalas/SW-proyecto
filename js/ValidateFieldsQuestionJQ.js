$(document).ready(function(){

    $('#email').blur(function(){
        if( $('#email').val() == ""){
            $('#email').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }else if(!validar_email()){
            $('#email').after('<p class="ErrorMsgs"> El email no es valido </p>');
        }
    });
    $('#email').focus(function(){
        $('#email').next("p").remove();
    });

    $('#pregunta').blur(function(){
        if( $('#pregunta').val() == ""){
            $('#pregunta').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }else if(!validar_long()){
            $('#pregunta').after('<p class="ErrorMsgs"> La pregunta tiene que tener un mínimo de 10 caracteres </p>');
        }
    });
    $('#pregunta').focus(function(){
        $('#pregunta').next("p").remove();
    });

    $('#right_answ').blur(function(){
        if( $('#right_answ').val() == ""){
            $('#right_answ').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }
    });
    $('#right_answ').focus(function(){
        $('#right_answ').next("p").remove();
    });

    $('#wrong_answ_1').blur(function(){
        if( $('#wrong_answ_1').val() == ""){
            $('#wrong_answ_1').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }
    });
    $('#wrong_answ_1').focus(function(){
        $('#wrong_answ_1').next("p").remove();
    });

    $('#wrong_answ_2').blur(function(){
        if( $('#wrong_answ_2').val() == ""){
            $('#wrong_answ_2').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }
    });
    $('#wrong_answ_2').focus(function(){
        $('#wrong_answ_2').next("p").remove();
    });

    $('#wrong_answ_3').blur(function(){
        if( $('#wrong_answ_3').val() == ""){
            $('#wrong_answ_3').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }
    });
    $('#wrong_answ_3').focus(function(){
        $('#wrong_answ_3').next("p").remove();
    });

    $('#tema').blur(function(){
        if( $('#tema').val() == ""){
            $('#tema').after('<p class="ErrorMsgs"> Este campo no puede estar vacío </p>');
        }
    });
    $('#tema').focus(function(){
        $('#tema').next("p").remove();
    });

})

function validarform() {
    if($('.ErrorMsgs').length == 0){
        return true;
    }else{
        return false;
    }
  }
  
  
  function validar_email() {
    var email = document.getElementById("email").value;
    var expresion_email_alumno = /^[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(eus|es)$/;
    var expresion_email_profe = /^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/;
  
    return (expresion_email_profe.test(email) || expresion_email_alumno.test(email));
    
  }
  
  function validar_dificultad() {
    var dificultad = document.getElementById("dificultad").value;
    var valores = /^[123]$/;
    return valores.test(dificultad);
  
  }
  
  function validar_long() {
    var pregunta = document.getElementById("pregunta").value;
    return pregunta.length >= 10;
  }
