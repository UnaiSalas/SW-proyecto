
function validarform() {
  return validar_vacios() && validar_email() && validar_long() && validar_dificultad();
}

function validar_vacios() {

    var email = document.getElementById("email").value;
    var pregunta = document.getElementById("pregunta").value;
    var right_answ = document.getElementById("right_answ").value;
    var wrong_answ_1 = document.getElementById("wrong_answ_1").value;
    var wrong_answ_2 = document.getElementById("wrong_answ_2").value;
    var wrong_answ_3 = document.getElementById("wrong_answ_3").value;
    var subject = document.getElementById("subject").value;

    if ((email == "") || (pregunta == "") || (right_answ == "") || (wrong_answ_1 == "") || (wrong_answ_2 == "") || (wrong_answ_3 == "") || (subject == "")){
      alert("Los campos obligatorios deben estar completos");
      return false;
    }else{
      return true;
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
  if(pregunta.length >= 10){
    return true;
  }else{
    alert("La pregunta debe tener como mínimo 10 caracteres");
    return false;
  }
}