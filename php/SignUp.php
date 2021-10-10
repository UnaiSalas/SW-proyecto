<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <form id='signup' name='signup' action='SignUp.php' method="POST" onsubmit="">
                <label for="t_usuario">Tipo usuario*: </label>
                <select name="t_usuario" id="t_usuario">
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
                <br />
                <label for="email">Email*: </label>
                <input type="text" id="email" size="21" name="email" value="" />
                <br />
                <label for="Nombre">Nombre*: </label>
                <input type="text" id="Nombre" size="21" name="Nombre" value="" />
                <br />
                <label for="Apellidos">Apellidos*: </label>
                <input type="text" id="Apellidos" size="21" name="Apellidos" value="" />
                <br />
                <label for="Password">Password*: </label>
                <input type="password" id="password" name="password" value="" />
                <br />
                <label for="RePassword">Repetir Password*: </label>
                <input type="password" id="repassword" name="repassword" value="" />
                <br />
                <input type="submit" id="signup" name="signup" value="Enviar" />
            </form>
        </div>
        <?php 
            include 'DbConfig.php';

            $error = "";


            if (isset($_POST['signup'])){

                $error = validacionser();
                if($error==""){
                    $mysql= mysqli_connect($server,$user,$pass,$basededatos) or die(mysqli_connect_error());

                    $t_usuario=$_POST['t_usuario'];
                    $Nombre =$_POST['Nombre'];
                    $Apellidos =$_POST['Apellidos'];
                    $username=$_POST['email'];
                    $pass=$_POST['password'];
                    $repass=$_POST['repassword'];
                    $usuarios = mysqli_query( $mysql,"select * from Usuarios where Email ='$username'");
                    $cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
                    if($cont==0){
                        $sql="INSERT INTO Usuarios (TipoUsuario, Email, Nombre, Apellidos, Passwords) 
                        VALUES ('$t_usuario','$username','$Nombre','$Apellidos','$pass')";
                            if (mysqli_query($mysql, $sql)) {
                                echo("<script> alert ('BIENVENIDO AL SISTEMA:". $username . "')</script>");
                            } else {
                                echo "<h2>Se ha producido un error. Intentelo de nuevo.</h2>";
                                echo "</br>";
                            }
                        
                        //echo ("Login correcto<p><a href=‘Layout.php'>Puede insertar preguntas</a>");
                    } else {
                        echo ("Este email ya está registrado");
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
                $t_usuario=$_POST['t_usuario'];
                $Nombre =$_POST['Nombre'];
                $Apellidos =$_POST['Apellidos'];
                $username=$_POST['email'];
                $pass=$_POST['password'];
                $repass=$_POST['repassword'];

                /*$palabrasN=explode(" ",$Nombre);
                if(strlen($palabrasN[0]) < 2 ) {
                    return '<p>El nombre no es válido<p>';
                }
                $palabrasA=explode(" ",$Apellidos);
                if(strlen($palabrasA[0]) < 2 ){
                    return '<p>Los apellidos no son válidos<p>';
                }*/
                $email_alumno = preg_match("/^[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(eus|es)$/", $username);
                $email_profe = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $username);

                if($username=="" || $username==null){
                    return 'El campo de email no puede estar vacio';
                }else if($t_usuario == "Alumno" && !$email_alumno){
                    return 'El email no coincide con la estructura del email de alumno';
                }else if($t_usuario == "Profesor" && !$email_profe){
                    return 'El email no coincide con la estructura del email de profesor';
                }
                if($Nombre=="" || $Nombre==null){
                    return 'El campo nombre no puede estar vacio';
                }else if(strlen($Nombre) < 2){
                    return 'El nombre no son validos';
                }
                if($Apellidos=="" || $Apellidos==null){
                    return 'El campo apellidos no puede estar vacio';
                }else if(strlen($Apellidos) < 2){
                    return 'Los apellidos no son validos';
                }
                if($pass=="" || $pass == null || $repass=="" || $repass== null){
                    return 'Los campos de contraseñas no pueden estar vacios';
                } else if(strlen($pass) < 8) {
                    return 'La contraseña tiene que tener al menos 8 caracteres';
                } else if($pass != $repass){
                    return 'Las contraseñas no son iguales';
                }

            }
    ?>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>