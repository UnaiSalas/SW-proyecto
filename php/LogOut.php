<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <?php
        echo "<script>
                alert('Hasta Pronto ');
            </script>";
        header("location: Layout.php");
    ?>
    <?php include '../html/Footer.html' ?>
</body>

</html>