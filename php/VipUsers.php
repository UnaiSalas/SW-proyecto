<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "");
DEFINE("_PORT_", "");
DEFINE("_USERNAME_", "");
DEFINE("_DATABASE_", "");
DEFINE("_PASSWORD_", "");

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
        case 'PUT':
            // Este no hay que implementar
        case 'DELETE':
            // Borrado de usuario VIP
			}
    Database::Desconectar($cnx);

?>
