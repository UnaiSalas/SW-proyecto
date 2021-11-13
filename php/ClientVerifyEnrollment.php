        <!-- Lab 7 -->
        <?php
          $correo = $_GET['correo']; 
          //instanciamos el objeto SoapClient con el WSDL del servicio
          $soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
          $method = 'comprobar';

         

          //Llamamos a la funcion que habiamos implementado en el Web Service
          //y devolvemos el resultado
          
          echo '<h3> El correo ' . $correo . ' ' . $soapclient->comprobar($correo) . ' existe </h3>';
          
        ?>
