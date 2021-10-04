<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/ValidateSignUp.js"></script>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <form id='fquestion' name='fquestion' action='AddQuestion.php' method="POST" onsubmit="return validarform();">
                <label for="t_usuario">Tipo usuario *</label>
                <select name="t_usuario" id="t_usuario">
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
                <br />
                <label for="email">Email *</label>
                <input type="text" id="email" name="email" value="" />
                <br />
                <label for="NombreYApellidos">NombreYApellidos *</label>
                <input type="text" id="NombreYApellidos" name="NombreYApellidos" value="" />
                <br />
                <label for="Password">Password *</label>
                <input type="password" id="password" name="password" value="" />
                <br />
                <label for="RePassword">Repetir Password *</label>
                <input type="repassword" id="repassword" name="repassword" value="" />
                <br />
                <input type="sumbit" id="Enviar" name="Enviar" value="Enviar" />
            </form>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>