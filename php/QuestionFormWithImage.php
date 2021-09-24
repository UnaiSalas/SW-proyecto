<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id='fquestion' name='fquestion' action='AddQuestion.php' method="GET" onsubmit="return validarform();">
        <label for="email"> Email*: </label>
        <input type="text" id="email" name="email" value=""/>
        <br />
        <label for="pregunta"> Enunciado de la pregunta*: </label>
        <input type="text" id="pregunta" name="pregunta" value=""/>
        <br />
        <label for="right_answ"> Respuesta correcta*: </label>
        <input type="text" id="right_answ" name="right_answ" value=""/>
        <br />
        <label for="wrong_answ_1"> Respuesta incorrecta*: </label>
        <input type="text" id="wrong_answ_1" name="wrong_answ_1" value=""/>
        <br />
        <label for="wrong_answ_2"> Respuesta incorrecta*: </label>
        <input type="text" id="wrong_answ_2" name="wrong_answ_2" value=""/>
        <br />
        <label for="wrong_answ_3"> Respuesta incorrecta*: </label>
        <input type="text" id="wrong_answ_3" name="wrong_answ_3" value=""/>
        <br />
        <label for="dificultad"> Selecione la dificultad: </label>
        <select name="dificultad" id="dificultad" >
          <option value="1">Baja</option>
          <option value="2">Media</option>
          <option value="3">Alta</option>
        </select>
        <br />
        <label for="subject"> Tema*: </label>
        <input type="text" id="subject" name="subject" value=""/>
        <br />
        <input type="submit" value="Enviar" id="bEnviar">
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
