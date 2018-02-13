<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <title>Title</title>
</head>

<?php $_SESSION['idprod'] = $_COOKIE['cookieName']; ?>
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
</html>