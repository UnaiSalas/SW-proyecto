<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <form id='login' name='login' method="POST" onsubmit="">
                <label for="email">Email*: </label>
                <input type="text" id="email" size="21" name="email" value="" />
                <br />
                <label for="Password">Password*: </label>
                <input type="password" id="password" name="password" value="" />
                <br />
                <input type="submit" id="login" name="login" value="Enviar" />
            </form>
        </div>
        <?php 
            include 'DbConfig.php';

            $error = "";


            if (isset($_POST['login'])){

                $error = validacionser();
                if($error==""){
                    $mysql= mysqli_connect($server,$user,$pass,$basededatos) or die(mysqli_connect_error());

                    $username=$_POST['email'];
                    $pass=$_POST['password'];
                    $usuarios = mysqli_query( $mysql,"select * from Usuarios where Email ='$username' AND Password='$pass'");
                    $cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
                    $row = mysqli_fetch_array($usuarios);
                    if($cont==1){
                        $url= "?email=".$row['Email'];
                        header("Location: Layout.php.$url");
                        //echo ("Login correcto<p><a href=‘Layout.php'>Puede insertar preguntas</a>");
                    } else {
                        echo ("El email o la contraseña facilitados no son correctos");
                    }
                    mysqli_close( $mysql); //cierra la conexion
                }else{
                    echo '<script language="javascript">';
                    echo "alert('" . $error . "')";
                    echo '</script>';
                }

            }
            /*
            <?php $errores='';
            if (isset ($_POST['email'])){
                $errores = validarEmail();
            }

            //mostrar formulario

            <span style:'color:red'> <?php echo ($errores)?> </span>

            if ($errores!=''){
                <scripts location.href = 'destino.php';
            }
            */

            function validacionser(){
                $username=$_POST['email'];
                $pass=$_POST['password'];

                if($username=="" || $username==null){
                    return 'El campo de email no puede estar vacío';
                }
                if($pass=="" || $pass==null){
                    return 'El campo de contraseña no puede estar vacío';
                }
            }

            //Queda comprobar si el nombre y usuario existen en la base de datos para hacer login
            
    ?>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>