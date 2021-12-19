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
    <meta name="google-signin-client_id" content="359225945399-lv6m2l8kiuagq30j1gdeqsdmiuf0o32v.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="../js/LoginGoogle.js"></script>
    <section class="main" id="s1">
        <div align='center' id='google' class='g-signin2' data-onsuccess='onSignIn'></div>
    </section>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <?php include '../html/Footer.html' ?>
</body>
</html> 