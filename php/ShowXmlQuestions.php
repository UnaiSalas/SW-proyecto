<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <style>
      table, th, td
        {
          border-style:solid;
          border-width:2px;
          border-color:pink;
          background-color: #83FAD9;
        }

    </style>
        <?php 
        $error = "";
        $questions_path = "../xml/Questions.xml";
        if(!file_exists($questions_path)){
          exit( "<p style='color:red;'>Error: No se puede acceder al xml </p> <br>");
        }
        $xml = simplexml_load_file($questions_path);

        echo '<table border=2 id="showQuestionTable"><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA CORRECTA</th> </tr>';

        foreach ($xml->children() as $assessmentItem) {
            $email = $assessmentItem['author'];
            foreach ($assessmentItem->children() as $child) {
              if ($child->getName() == 'itemBody'){
                $enunciado = $child->p;
              }
              if ($child->getName() == 'correctResponse'){
                  $resCorrecta = $child->response;
              }
            }

            echo '<tr>
                    <td>' .$email .'</td>
                    <td>' .$enunciado . '</td>
                    <td>' .$resCorrecta . '</td>
                </tr>';
          }


        echo '</table>';
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>