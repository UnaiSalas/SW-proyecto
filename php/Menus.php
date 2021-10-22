<?php 
  include "DbConfig.php";
  if(isset($_GET['email'])){
    $url = "?email=" . $_GET['email'];

    echo("
      <header class='main' id='h1'>
        <span class='right'><a href='LogOut.php'>Logout</a></span>
        <span class='right'>". $_GET['email']."</span>
      </header>

      <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php".$url. "'>Inicio</a></span>
        <span><a href='QuestionFormWithImage.php".$url."'> Insertar Pregunta</a></span>
        <span><a href='ShowQuestions.php".$url."'> Ver Preguntas</a></span>
        <span><a href='ShowXmlQuestions.php".$url."'> Ver Preguntas XML</a></span>
        <span><a href='ShowJSONQuestions.php".$url."'> Ver Preguntas JSON</a></span>
        <span><a href='Credits.php".$url."'>Creditos</a></span>
      </nav>
    ");
  }else{
    echo("
    <div id='page-wrap'>
      <header class='main' id='h1'>
        <span class='right'><a href='SignUp.php'>Registro</a></span>
        <span class='right'><a href='LogIn.php'>Login</a></span>

      </header>

      <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>
        <span><a href='Credits.php'>Creditos</a></span>
      </nav>
    ");
 
  }


?>