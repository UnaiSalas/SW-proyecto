<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      Código PHP para mostrar una tabla con las preguntas de la BD.<br>
      La tabla no incluye las imágenes
      <?php
        $servername = "127.0.0.1"; 
        $username = "root";  // en entorno de desarrollo OK, pero en producción usaremos otro usuario
        $password = ""; // en entorno de desarrollo OK, pero en producción definiremos password
        $dbname = "Quiz";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        echo "Conectado";
        // Check connection
        if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT clave FROM Preguntas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)){
            echo "clave: " . $row["clave"] . " - email: " . $row["email"] . "\n<br>";
          }
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
