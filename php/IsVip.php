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
      
        <h1>Cliente REST para saber si el usuario es VIP</h1><br>
        <form id="fisVip" name="fisVip" method="GET" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <input type="text" id="id" name="id">
          <input type="button" id="esVIP" name="esVIP" value="Es VIP?"></button>
        </form>
        <?php
            $culr = curl_init();
            $url = "https://sw.ikasten.io/~G24/LabWebServices/php/VipUsers.php?id=vadillo@ehu.eus";
            curl_setopt($culr, CURLOPT_URL, $url);
            curl_setopt($culr, CURLOPT_RETURNTRANSFER, 1);
            $str = curl_exec($culr);
            echo $str;
        ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
