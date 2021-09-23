<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/ValidateFieldsQuestionsJS.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id='fquestion' name='fquestion' action=’AddQuestion.php’>
        Email:
        <input type="text" id="email" name="email" value=""/>
        <br />
        Enunciado de la pregunta:
        <input type="text" id="pregunta" name="pregunta" value=""/>
        <br />
        Respuesta correcta:
        <input type="text" id="right_answ" name="right_answ" value=""/>
        <br />
        Respuesta incorrecta:
        <input type="text" id="wrong_answ_1" name="wrong_answ_1" value=""/>
        <br />
        Respuesta incorrecta:
        <input type="text" id="wrong_answ_2" name="wrong_answ_2" value=""/>
        <br />
        Respuesta incorrecta:
        <input type="text" id="wrong_answ_3" name="wrong_answ_3" value=""/>
        <br />
        Selecione la dificultad
        <select name="dificultad" id="dificultad" >
          <option value="1">Baja</option>
          <option value="2">Media</option>
          <option value="3">Alta</option>
        </select>
        <br />
        Tema (subject):
        <input type="text" id="subject" name="subject" value=""/>
        <br />
        <input type="submit" value="Enviar" onclick="validar_form()">
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
  <script src="ValidateFieldsQuestionsJS.js"></script>
</body>
</html>
