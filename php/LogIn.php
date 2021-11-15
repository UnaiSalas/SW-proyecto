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
          .imgPrev {
            display: block;
            width: auto;
            height: 100%;
          }
        </style>
        <form id="flogin" name="flogin" action="LogIn.php" method="POST" actionstyle="width: 60%; margin: 0px auto;">
          <table style="border:4px solid #c1e9f6;" bgcolor="#9cc4e8">
            <caption style="text-align:left">
              <h2>Login de usuario</h2> 
            </caption>
            <tr>
              <td align="right">Dirección de correo (*): </td>
              <td align="left"><input type="text" id="correo" name="correo" autofocus></td>
            </tr>
            <tr>
              <td align="right">Contraseña (*): </td>
              <td align="left"><input style="width: 600px;" type="password" id="userpass" name="userpass" autofocus></td>
            </tr>
            <tr>
            <td></td>                               <!-- NO VALIDA SIMPLEMENTE EJECUTA EL SCRIPT-->
              <td align="left"><input type="submit" id="botonLogin" name="botonLogin" value="Acceder"></button></td>
            </tr>
          </table>
        </form>
        <?php
        //Validación del registro en el servidor
        if (isset($_POST['botonLogin'])){
            $correo = "";
            $userpass = "";

            $correo = $_POST['correo']; 
            $userpass = $_POST['userpass'];
            
            if($correo == ""){
                echo "<h3>Debes introducir una dirección de correo.</h3>";
                echo "<br>";
                echo "<a href='LogIn.php'>";
            }
            else if($userpass == ""){
                echo "<h3>Debes introducir una contraseña.</h3>";
                echo "<br>";
                echo "<a href='LogIn.php'>";
            }
            else{
              //Si no ha habido ningún error, se INTENTA logear al usuario
              //Conectamos con la base de datos mysql
              include 'DbConfig.php';
              $conn = mysqli_connect($server, $user, $pass, $basededatos);
              $conn->set_charset("utf8");

              if(!$conn){
                die("Connection failed: " . mysqli_connect_error());
              }
              $sql = "SELECT * from users where correo = '$correo' and pass = '$userpass'";
              $logear = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              $row = mysqli_fetch_array($logear, MYSQLI_ASSOC) ; //Lo convertimos a array

              if(is_null($row)){
                echo "<h3>Datos de login incorrectos. :(</h3>";
                echo "<br>";
              }
              else{




                // LAB 7 DE SEGURIDAD BASADA EN SESIONES
                // https://obedalvarado.pw/blog/formulario-inicio-sesion-php-mysql/

                //Logear al usuario
                //printf ("%s (%s)\n", $row["correo"], $row["pass"]);
                if(($row['correo'] == $correo) && ($row['pass'] == $userpass)){
                  echo '<script type="text/javascript"> alert("Bienvenido al Sistema: '. $correo .' "); </script>';
                        //window.location.href="Layout.php?correo='.$correo.'";
                        session_start();
                        $_SESSION['login']=$correo;
                        header("Location:Layout.php");
                }
                else{
                  echo "<h3>Datos de login incorrectos. :(</h3>";
                  echo "<br>";
                }
              } 
          }
        }
        ?>
    </div>
    </section>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <?php include '../html/Footer.html' ?>
</body>
</html> 