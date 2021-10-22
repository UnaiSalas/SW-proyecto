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
        
        
        $questions_path = "../json/Questions.json";
        if(!file_get_contents($questions_path)){
          exit( "<p style='color:red;'>Error: No se puede acceder al xml </p> <br>");
        }else{
            $data = file_get_contents($questions_path);
            $array=json_decode($data);
            echo '<table border=2 id="showQuestionTable"><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA CORRECTA</th> </tr>';

            foreach ($array->assessmentItems as $pregunta) {
                $enunciado= $pregunta->itemBody[1];
                $email=$pregunta->author;
                $resCorrecta=$pregunta->correctResponse[1];

                echo '<tr>
                        <td>' .$email .'</td>
                        <td>' .$enunciado . '</td>
                        <td>' .$resCorrecta . '</td>
                    </tr>';
            }


            echo '</table>';
        }

        
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>