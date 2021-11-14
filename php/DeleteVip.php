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
      
        <h1>Cliente REST para borrar un email de la lista de usuarios VIP</h1><br>
        <input type="text" id="id" name="id">
        <input type="button" id="eliminarVip" name="eliminarVip" value="Eliminar VIP"></button>
        <?php
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            $output = curl_exec($ch);
            echo $output;
            curl_close($ch);
        ?>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
