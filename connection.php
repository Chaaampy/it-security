<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
<!--    <link rel="stylesheet" href="style.css">-->
    <script src="js/script.js"></script>
</head>
<body>
    <form action="/treatment/verifConnexion.php" method="post">
        Pseudo:<br>
        <input type="text" name="login" value="" required>
        <br>
        Mot de passe:<br>
        <input type="password" name="pwd" value="" required>
        <br><br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>