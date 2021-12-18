<?php
    session_start();
?>
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
              try{
                $dsn = "mysql:host=$server;dbname=$basededatos";
                $dbh = new PDO($dsn, $user, $pass);
              } catch (PDOException $e){
                echo $e->getMessage();
              }
              // FETCH_OBJ
              $query = $dbh->prepare("SELECT * FROM users WHERE correo=?");
              $query->bindParam(1, $correo);
              // Especificamos el fetch mode antes de llamar a fetch()
              $query->setFetchMode(PDO::FETCH_OBJ);
              // Ejecutamos
              $query->execute();
              $row = $query->fetch();
              if(password_verify($userpass, $row->pass)){
                if($row->estado=='Activo'){
                  $_SESSION['correo']=$row->correo;
                  $_SESSION['nombre']=$row->nom;
                  $_SESSION['apellido']=$row->apell;
                  $_SESSION['imagen']=$row->img;
                  $_SESSION['estado']=$row->estado;
                  if($correo == 'admin@ehu.es'){
                    $_SESSION['tipo']='admin';
                  }else{
                    $_SESSION['tipo']=$row->tipouser;
                  }
                  $dbh = null;
                  echo '<script type="text/javascript"> alert("Bienvenido al Sistema: '. $_SESSION['correo'] .' ");
                          window.location.href="Layout.php";
                          </script>';
                } else {
                  $dbh = null;
                  echo '<script>
                      alert("Este usuario está bloqueado");
                      window.location.href="LogIn.php";
                    </script>';
                }
              } else {
                $dbh = null;
                echo "<h3>Datos de login incorrectos. :(</h3>";
                echo "<br>";
              }
              // cerrar conexión
              //$dbh = null;
          }
        }
        
        ?>
    </div>
    </section>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <?php include '../html/Footer.html' ?>
</body>
</html> 