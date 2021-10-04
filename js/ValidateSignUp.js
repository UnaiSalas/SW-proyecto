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