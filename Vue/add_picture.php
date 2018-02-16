<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <title>Ajouter une image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script src="../config/app.js"></script>
    <script src="js/javanous/search_dept.js"></script>
</head>

<?php $_SESSION['idprod'] = $_COOKIE['cookieName']; ?>
<?php include "header.html"; ?>
<body>
<form action="../Controleur/upload.php" method="post" enctype="multipart/form-data">
    <p id="uploadForm" align="center"><br/>
        <label>
            <input name="myfile" accept="image/*" type="file" size="30"/>
        </label>
        <label>
            <input type="submit" name="submitBtn" class="sbtn" value="Ajouter l'image"/>
        </label>
    </p>
</form>
</body>
<br><br><br><br><br>
<?php include "footer.html"; ?>
</html>