<?php
session_start();

//On enregistre notre token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token; ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
<!--    <link rel="stylesheet" href="style.css">-->
    <script src="js/script.js"></script>
</head>
<body>
    <form action="/treatment/verifRegister.php" method="post">
        Pseudo:<br>
        <input type="text" name="login" value="" required>
        <br>
        Email:<br>
        <input type="email" name="email" value="" required>
        <br>
        Mot de passe:<br>
        <input type="password" name="pwd" value="" required>
        <br>
        Confirmer mot de passe:<br>
        <input type="password" name="pwdConf" value="" required>
        <br><br>
        <input type="submit" value="Valider">
        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
    </form>
</body>
</html>