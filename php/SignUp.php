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
                <label for="t_usuario">Tipo usuario *</label>
                <select name="t_usuario" id="t_usuario">
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
                <br />
                <label for="email">Email *</label>
                <input type="text" id="email" size="21" name="email" value="" />
                <br />
                <label for="Nombre">Nombre y apellidos *</label>
                <input type="text" id="NombreYApellidos" size="21" name="NombreYApellidos" value="" />
                <br />
                <label for="Password">Password *</label>
                <input type="password" id="password" name="password" value="" />
                <br />
                <label for="RePassword">Repetir Password *</label>
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

                    $username=$_POST['email'];
                    $usuarios = mysqli_query( $mysql,"select * from Usuarios where Email ='$username'");
                    $cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
                    mysqli_close( $mysql); //cierra la conexion
                    if($cont==0){
                        echo("<script> alert ('BIENVENIDO AL SISTEMA:". $username . "')</script>");
                        //echo ("Login correcto<p><a href=‘Layout.php'>Puede insertar preguntas</a>");
                    } else {
                        echo ("Este email ya está registrado");}
                }else{
                    echo '<script language="javascript">';
                    echo "alert('" . $error . "')";
                    echo '</script>';
                }

            }  


            function validacionser(){
                $t_usuario=$_POST['t_usuario'];
                $NombreYApellidos =$_POST['NombreYApellidos'];
                $username=$_POST['email'];
                $pass=$_POST['password'];
                $repass=$_POST['repassword'];

                $palabras=explode(" ",$NombreYApellidos);
                if((strlen($palabras[0]) < 2 ) && (strlen($palabras[1]) < 2 )){
                    return '<p>El nombre y apellidos no son validos<p>';
                }
                $email_alumno = preg_match("/^[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(eus|es)$/", $username);
                $email_profe = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $username);

                if($username=="" || $username==null){
                    return '<p>El campo de email no puede estar vacio</p>';
                }else if($t_usuario == "Alumno" && !$email_alumno){
                    return '<p>El email no coincide con la estructura del email de alumno</p>';
                }else if($t_usuario == "Profesor" && !$email_profe){
                    return '<p>El email no coincide con la estructura del email de profesor</p>';
                }
                if($NombreYApellidos=="" || $NombreYApellidos==null){
                    return '<p>El campo nombre y apellido no puede estar vacio</p>';
                }
                if($pass=="" || $pass == null || $repass=="" || $repass== null){
                    return '<p>Los campos de contraseñas no pueden estar vacios<p>';
                }else if($pass != $repass){
                    return '<p>Las contraseñas deben ser iguales<p>';
                }

            }
    ?>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>