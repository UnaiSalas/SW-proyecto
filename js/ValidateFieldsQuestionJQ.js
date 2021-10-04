/*$(document).ready(function(){

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
    if(($('.ErrorMsgs').length == 0) && validar_vacios()){
        return true;
    }else{
        return false;
    }
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

  function validar_vacios() {

    var email = document.getElementById("email").value;
    var pregunta = document.getElementById("pregunta").value;
    var right_answ = document.getElementById("right_answ").value;
    var wrong_answ_1 = document.getElementById("wrong_answ_1").value;
    var wrong_answ_2 = document.getElementById("wrong_answ_2").value;
    var wrong_answ_3 = document.getElementById("wrong_answ_3").value;
    var tema = document.getElementById("tema").value;

    if ((email == "") || (pregunta == "") || (right_answ == "") || (wrong_answ_1 == "") || (wrong_answ_2 == "") || (wrong_answ_3 == "") || (tema == "")){
      alert("Los campos obligatorios deben estar completos");
      return false;
    }else{
      return true;
    }
  }*/


$(document).ready(function () {
    $('#Enviar').click(function () {

        var email = $('#email').val();
        var pregunta = $('#pregunta').val();
        var right_answ = $('#right_answ').val();
        var wrong_answ_1 = $('#wrong_answ_1').val();
        var wrong_answ_2 = $('#wrong_answ_2').val();
        var wrong_answ_3 = $('#wrong_answ_3').val();
        var tema = $('#tema').val();

        if (email == '' || email == null) {
            alert('El campo Email no puede estar vacio');
            return false;
        } else if (!validar_email()) {
            alert('El email introducido no es valido');
            return false;
        }
        if (pregunta == '' || pregunta == null) {
            alert('El campo Enunciado de la pregunta no puede estar vacio');
            return false;
        } else if (pregunta.length < 10) {
            alert('La pregunta debe tener como minimo 10 caracteres');
            return false;
        }
        if (right_answ == '' || right_answ == null) {
            alert('El campo Respuesta correcta no puede estar vacio');
            return false;
        }
        if (wrong_answ_1 == '' || wrong_answ_1 == null) {
            alert('El campo Respuesta incorrecta no puede estar vacio');
            return false;
        }
        if (wrong_answ_2 == '' || wrong_answ_2 == null) {
            alert('El campo Respuesta incorrecta no puede estar vacio');
            return false;
        }
        if (wrong_answ_3 == '' || wrong_answ_3 == null) {
            alert('El campo Respuesta incorrecta no puede estar vacio');
            return false;
        }
        if (tema == '' || tema == null) {
            alert('El campo Tema no puede estar vacio');
            return false;
        }

    });
    function validar_email() {
        var email = document.getElementById("email").value;
        var expresion_email_alumno = /^[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(eus|es)$/;
        var expresion_email_profe = /^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/;

        return (expresion_email_profe.test(email) || expresion_email_alumno.test(email));

    }
});

