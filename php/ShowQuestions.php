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
        $servername = "127.0.0.1"; 
        $username = "root";  // en entorno de desarrollo OK, pero en producción usaremos otro usuario
        $password = ""; // en entorno de desarrollo OK, pero en producción definiremos password
        $dbname = "Quiz";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        echo "Conectado<br>";
        // Check connection
        if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT email, pregunta, right_answ, wrong_answ_1, wrong_answ_2, wrong_answ_3, dificultad, tema FROM Preguntas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)){
            echo "email: " . $row["email"] . " - pregunta: " . $row["pregunta"] . " - right_answ: " . $row["right_answ"] . " - wrong_answ_1: " . $row["wrong_answ_1"] . " - wrong_answ_2: " . $row["wrong_answ_2"] . " - wrong_answ_3: " . $row["wrong_answ_3"] . " - dificultad: " . $row["dificultad"] . " - tema: " . $row["tema"] . "\n<br><br><br>";
          }

          // esto es para ponerlo más bonito (falta por hacer ya que lo hace mal)
          // probar lo que pone en este enlace: https://es.stackoverflow.com/questions/78414/como-mostrar-los-datos-de-una-base-de-datos-en-una-tabla-en-html-y-php
          ?>
          <table class="default">
            <thead>
            <tr>
              <th>email</th>
              <th>pregunta</th>
              <th>right_answ</th>
              <th>wrong_answ_1</th>
              <th>wrong_answ_2</th>
              <th>wrong_answ_3</th>
              <th>dificultad</th>
              <th>tema</th>
            </tr>
        </thead>
              <?while ($row = mysqli_fetch_assoc($result)){?>
                <td><?php $row['email'] ?></td>
          </table>
          <?php
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
