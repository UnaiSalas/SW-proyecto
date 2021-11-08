<!DOCTYPE html>
<html>
  <head>
    <?php include '../html/Head.html'?>
  </head>
  <body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
    <div>
      
        <!-- Lab 7 -->
        <?php
          $correo = $_POST['correo'];
          //instanciamos el objeto SoapClient con el WSDL del servicio
          $soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');

          //Llamamos a la funcion que habiamos implementado en el Web Service
          //y devolvemos el resultado
          if (isset($_POST['botonReg'])){
            echo '<h3> El correo ' . $correo . $soapclient->comprobar($correo) . ' existe </h3>';
          }
        ?>

    </div>
    </section>
    <?php include '../html/Footer.html' ?>
  </body>
</html>