<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/ValidateFieldsQuestionsJS.js"></script>
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id='fquestion' name='fquestion' action='AddQuestion.php' method="GET">
        <label for="email"> Email: </label>
        <input type="text" id="email" name="email" value=""/>
        <br />
        <label for="email"> Enunciado de la pregunta: </label>
        <input type="text" id="pregunta" name="pregunta" value=""/>
        <br />
        <label for="email"> Respuesta correcta: </label>
        <input type="text" id="right_answ" name="right_answ" value=""/>
        <br />
        <label for="email"> Respuesta incorrecta: </label>
        <input type="text" id="wrong_answ_1" name="wrong_answ_1" value=""/>
        <br />
        <label for="email"> Respuesta incorrecta: </label>
        <input type="text" id="wrong_answ_2" name="wrong_answ_2" value=""/>
        <br />
        <label for="email"> Respuesta incorrecta: </label>
        <input type="text" id="wrong_answ_3" name="wrong_answ_3" value=""/>
        <br />
        <label for="email"> Selecione la dificultad: </label>
        <select name="dificultad" id="dificultad" >
          <option value="1">Baja</option>
          <option value="2">Media</option>
          <option value="3">Alta</option>
        </select>
        <br />
        <label for="email"> Tema: </label>
        <input type="text" id="subject" name="subject" value=""/>
        <br />
        <input type="submit" value="Enviar" onClick="return validar_form();">
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
