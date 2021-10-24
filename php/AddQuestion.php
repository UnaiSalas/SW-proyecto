<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <?php
        include 'DbConfig.php';
        $url = "?email=".$_GET['email'];

        // Create connection
        $conn = mysqli_connect($server, $user, $pass, $basededatos);
        // Check connection
        if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        /*
        $sql = "INSERT INTO Preguntas (email, Pregunta, Right_Answer, Wrong_Answer1, Wrong_Answer2, Wrong_Answer3, Complejidad, Tema, Imagen)
        VALUES (?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssssssiss', $_POST['email'], $_POST['pregunta'], $_POST['right_answ'], $_POST['wrong_answ_1'], $_POST['wrong_answ_2'], $_POST['wrong_answ_3'], $_POST['dificultad'], $_POST['tema'], '$path');
        
        if($stmt->execute()){
          echo "<h2>Ir a insertar pregunta</h2>";
          echo "</br>";
          echo "<span><a href='ShowQuestions.php'> Mostrar preguntas almacenadas</span>";
        }else{
          echo "<h2>Se ha producido un error. Intentelo de nuevo.</h2>";
          echo "</br>";
          echo "<span><a href='QuestionFormWithImage.php'> <h2>Ir a insertar pregunta</h2></a></span>";
        }*/
        if(isset($_POST['Enviar'])){ 
          $email = $_POST['email'];
          $pregunta = $_POST['pregunta'];
          $right_answer = $_POST['right_answ'];
          $wrong_answer1 = $_POST['wrong_answ_1'];
          $wrong_answer2 = $_POST['wrong_answ_2'];
          $wrong_answer3 = $_POST['wrong_answ_3'];
          $dificultad = $_POST['dificultad'];
          $tema = $_POST['tema'];
          $name=$_FILES['imagen']['name'];
          $tempname=$_FILES['imagen']['tmp_name'];
          $dir='';
          if(!empty($_FILES['imagen']['tmp_name'])){
            $dir='../images/ImagenesBD/'.$name;
          }else{
            $dir='../images/ImagenesBD/placeholder.png';
          }

          $email_alumno = preg_match("/^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$/", $email);
          $email_profe = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $email);

          $error='';
          if (empty($email)){
            $error = "El campo email no puede estar vacío";
            $code = 1;
          } else if (empty($pregunta)){
            $error = "El campo pregunta no puede estar vacío";
            $code = 1;
          } else if (empty($right_answer)){
            $error = "Los campos de respuesta no pueden estar vacíos";
            $code = 1;
          } else if (empty($wrong_answer1)){
            $error = "Los campos de respuesta no pueden estar vacíos";
            $code = 1;
          } else if (empty($wrong_answer2)){
            $error = "Los campos de respuesta no pueden estar vacíos";
            $code = 1;
          } else if (empty($wrong_answer3)){
            $error = "Los campos de respuesta no pueden estar vacíos";
            $code = 1;
          } else if (empty($tema)){
            $error = "El campo de tema no puede estar vacío";
            $code = 1;
          } else if (!($email_alumno || $email_profe)){
            $error = "El email no es correcto";
            $code=2;
          } else if (strlen($pregunta) < 10){
            $error = "El campo de pregunta tiene que tener como mínimo 10 caracteres";
            $code = 3;
          }
          if (!empty($error)){
            echo '<script language="javascript">';
            echo "alert('" . $error . "')";
            echo '</script>';
            echo "<a href='QuestionFormWithImage.php" . $url . "'>Volver</a>";
          } else {
            echo "<h2>Pregunta insertada correctamente<h2>";

            $sql = "INSERT INTO Preguntas (Email,Pregunta,Right_Answer,Wrong_Answer1,Wrong_Answer2,Wrong_Answer3,Complejidad,Tema,Imagen)
            VALUES ('$email','$pregunta','$right_answer','$wrong_answer1','$wrong_answer2','$wrong_answer3','$dificultad','$tema','$dir')";
            if (mysqli_query($conn, $sql)) {
              if(move_uploaded_file($tempname, $dir)){
                echo "<h2>Ir a insertar pregunta</h2>";
                echo "</br>";
                echo "<span><a href='ShowQuestions.php.$url'> Mostrar preguntas almacenadas</span>";
              }
            } else {
              echo "<h2>Se ha producido un error. Intentelo de nuevo.</h2>";
              echo "</br>";
              echo "<span><a href='QuestionFormWithImage.php.$url'> <h2>Ir a insertar pregunta</h2></a></span>";
            }

          }
        }
        mysqli_close($conn);
      ?>



      <!-- Laboratorio 5 (XML) -->
      <!-- https://diego.com.es/tutorial-de-simplexml -->
      <!-- https://www.php.net/manual/es/simplexmlelement.addattribute.php -->
      <?php
      $xml_path = '../xml/Questions.xml';
      if(!$xml = simplexml_load_file($xml_path)){
          echo "No se ha podido cargar el archivo XML";
      } else {
          echo "El archivo XML se ha cargado correctamente";
          $assessment = $xml->addChild('assessmentItem');
          $assessment -> addAttribute('subject', $tema);
          $assessment -> addAttribute('author',$email);
          $pregunta_xml = $assessment -> addChild('itemBody');
          $pregunta_xml -> addChild('p', $pregunta);
          $correcta = $assessment ->addChild('correctResponse');
          $correcta ->addChild('response', $right_answer);
          $incorrecta = $assessment ->addChild('incorrectResponse');
          $incorrecta ->addChild('response', $wrong_answer1);
          $incorrecta ->addChild('response', $wrong_answer2);
          $incorrecta ->addChild('response', $wrong_answer3);

          $xml->asXML('../xml/Questions.xml');
          echo "</br>";
          echo "Guardada en el XML";
      }
      ?>

      <?php
      $json_path = '../json/Questions.json';
      if(!$archivo = file_get_contents($json_path)){
        echo "No se ha podido cargar el archivo JSON";
      }else{
        echo "Se ha cargado el archivo JSON";
        $array = json_decode($archivo);
        $pregunta_JSON = new stdClass();
        $pregunta_JSON->subject=$tema;
        $pregunta_JSON->author=$email;
        $pregunta_JSON->itemBody->p=$pregunta;
        $pregunta_JSON->correctResponse->value=$right_answer;
        $pregunta_JSON->incorrectResponses->value=array($wrong_answer1,$wrong_answer2,$wrong_answer3);
        $preguntaarray[0]=$pregunta_JSON;
        array_push($array->assessmentItems, $preguntaarray[0]);
        $jsonData = json_encode($array);
        $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData);
        $jsonData = str_replace(',', ','.PHP_EOL, $jsonData);
        $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
        file_put_contents('../json/Questions.json',$jsonData);
        echo "Insertado el JSON";
      
      }

      
      
      ?>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
