        <!-- Lab 7 -->
        <?php
          $correo = $_GET['correo']; 
          //instanciamos el objeto SoapClient con el WSDL del servicio
          $soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
          $method = 'comprobar';


          //Llamamos a la funcion que habiamos implementado en el Web Service
          //y devolvemos el resultado
          if($soapclient->comprobar($correo) == "SI"){
            echo '<h3 style="color:Green;"> El correo ' . $correo . ' ' . $soapclient->comprobar($correo) . ' es válido </h3>';
          }else{

            echo '<h3 style="color:Red;"> El correo ' . $correo . ' ' . $soapclient->comprobar($correo) . ' es válido </h3>';
          }


        
          
        ?>
