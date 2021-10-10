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
      table
        {
          border-style:solid;
          border-width:2px;
          border-color:pink;
        }

</style>
      <?php
        include 'DbConfig.php';

        // Create connection
        $conn = mysqli_connect($server, $user, $pass, $basededatos);
        echo "Conectado<br>";
        // Check connection
        if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT email, Pregunta, Right_Answer, Wrong_Answer1, Wrong_Answer2, Wrong_Answer3, Complejidad, Tema, Imagen FROM Preguntas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
          // output data of each row
          //while ($row = mysqli_fetch_assoc($result)){
            //echo "email: " . $row["email"] . " - pregunta: " . $row["Pregunta"] . " - right_answ: " . $row["Right_Answer"] . " - wrong_answ_1: " . $row["Wrong_Answer1"] . " - wrong_answ_2: " . $row["Wrong_Answer2"] . " - wrong_answ_3: " . $row["Wrong_Answer3"] . " - dificultad: " . $row["Complejidad"] . " - tema: " . $row["Tema"] . "\n<br><br><br>";
          //}

          // esto es para ponerlo más bonito (falta por hacer ya que lo hace mal)
          // probar lo que pone en este enlace: https://es.stackoverflow.com/questions/78414/como-mostrar-los-datos-de-una-base-de-datos-en-una-tabla-en-html-y-php
          
          echo "<table border='1'>"; // start a table tag in the HTML
          echo "<tr><th>Email</th><th>Pregunta</th><th>Respuesta Correcta</th><th>Respuesta Incorrecta</th><th>Respuesta Incorrecta</th><th>Respuesta Incorrecta</th><th>Complejidad</th><th>Tema</th><th>Imagen</th></tr>";

          while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
            if ($row['Complejidad']==1){
              $comp = "Baja";
            }
            if ($row['Complejidad']==2){
              $comp = "Media";
            }
            if ($row['Complejidad']==3){
              $comp = "Alta";
            }
            echo 
              "<tr>
                <td>" . $row['email'] . "</td>
                <td>" . $row['Pregunta'] . "</td>
                <td>" . $row['Right_Answer'] . "</td>
                <td>" . $row['Wrong_Answer1'] . "</td>
                <td>" . $row['Wrong_Answer2'] . "</td>
                <td>" . $row['Wrong_Answer3'] . "</td>
                <td>" . $comp . "</td>
                <td>" . $row['Tema'] . "</td><td><img width='80px' height='80px' src='".$row['Imagen']."' /></td>
              </tr>";  //$row['index'] the index here is a field name
          }

          echo "</table>";
          
        }else{
          echo "0 results";
        }
        mysqli_close($conn);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
