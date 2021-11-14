<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "3306");
DEFINE("_USERNAME_", "G24");
DEFINE("_DATABASE_", "db_G24");
DEFINE("_PASSWORD_", "oqpjFF3vQ7Gbp");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

    $cnx = Database::Conectar();
    switch ($method) {
        case 'GET': 
			if(isset($_GET['id']))
			{
            $datos = "";
            $id = $_GET['id'];
			$sql = "SELECT * FROM vips WHERE email='$id'";
            $data=Database::EjecutarConsulta($cnx, $sql);
			if (isset($data[0])){echo "<br><br><b>ENHORABUENA ".$id." ES VIP</b><br><img src=../images/ok.png>";break;}
			else {echo "<br><br><b>LO SIENTO ".$id." NO ES VIP</b><br><img src=../images/mal.png>";
			break;}
			}
			else
			{
				// Servicio para Listar Vips (GET sin parámetro)
                $result = mysqli_query($cnx, $sql);
                echo "<table " . " bgcolor=" . "'#9cc4e8'" . ">";
                echo "<tr>
                <th>Correo</th>
                </tr>";

                while($row = mysqli_fetch_array($result)){

                echo
                "<tr>
                <td>" . $row['email'] . "</td></tr>";

                }
                echo "</table>";
			}
			break;
        case 'POST':
            // Para añadir VIPS
            $arguments = $_POST;
            $result = 0;
            $email = $arguments['email'];
            $sql = "INSERT INTO vips (email) VALUES ('$email');";
            $num=Database::EjecitarNoConsulta($cnx, $sql);
            if ($num==0){
                echo "Ya está en la BD";
            } else {
                echo json_encode(array('insertedEmail' => $email));
            }
            break;

        case 'PUT':
            // Este no hay que implementar
        case 'DELETE':
            // Borrado de usuario VIP
			}
    Database::Desconectar($cnx);

?>
