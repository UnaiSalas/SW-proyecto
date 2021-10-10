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
        mysqli_close($conn);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
