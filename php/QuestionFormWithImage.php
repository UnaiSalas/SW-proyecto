<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <FORM 
        action="../"
        method="post">
        Email:
        <input type="text" name="email" value=""/>
        <br />
        Enunciado de la pregunta:
        <input type="text" name="pregunta" value=""/>
        <br />
        Respuesta correcta:
        <input type="text" name="right_answ" value=""/>
        <br />
        Respuesta incorrecta:
        <input type="text" name="wrong_answ_1" value=""/>
        <br />
        Respuesta incorrecta:
        <input type="text" name="wrong_answ_2" value=""/>
        <br />
        Respuesta incorrecta:
        <input type="text" name="wrong_answ_3" value=""/>
        <br />
        Selecione la dificultad
        <select name="dificultad">
          <option value="1">Baja</option>
          <option value="2">Media</option>
          <option value="3">Alta</option>
        </select>
        Tema (subject):
        <input type="text" name="subject" value=""/>
        <br />
      </FORM>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
