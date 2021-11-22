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
        td, th {
          margin: 25px 0;
          font-size: 0.9em;
          font-family: sans-serif;
          padding: 6px;
          border: solid 2px #c1e9f6;
        }
        table {
          border-collapse: collapse;
        }
        .imgPrev {
            display: block;
            width: 100%;
            height: auto;
        }
        .imgPrev2 {
            display: block;
            width: 100px;
            height: 100px;
        }
      </style>
      <?php
        $xml = simplexml_load_file('../xml/Questions.xml');
        echo "<table " . " bgcolor=" . "'#9cc4e8'" . ">";
        echo "<tr>
        <th>Autor</th>
        <th>Enunciado</th>
        <th>Respuesta correcta</th>
        </tr>";
        
        foreach($xml->children() as $pregunta){
          $attr = $pregunta->attributes(); //Para obtener el autor
          echo
          "<tr>" .
          "<td>" . $attr['author'] . "</td>" . //Autor
          "<td>" . $pregunta->itemBody->p . "</td>" . //Enunciado
          "<td>" . $pregunta->correctResponse->response . "</td>"; //Correcta
        }

        echo "</table>";

        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>