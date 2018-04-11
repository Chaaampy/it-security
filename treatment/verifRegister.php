<?php
session_start();
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 11/04/18
 * Time: 14:51
 */


// On vérifie que le token est OK
if(($_SESSION['token'] == $_POST['token']) && ($_POST['pwd'] == $_POST['pwdConf'])){
    $username = 'root';
    $password = '';
    $host = 'localhost';
    $dbName = 'livreOr';

    $db = new PDO("mysql:dbname=$dbName;host=$host", $username, $password);
    $query=$db->query("SELECT * FROM user WHERE name='".$_POST['login']."'");
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

    if(count($resultat) == 0){

        $query = $db->prepare("INSERT INTO user(name, email, password) VALUES (:name, :email, :password)");

        $array = array(
            ':name' => $_POST['login'],
            ':email' => $_POST['email'],
            ':password' => md5($_POST['pwd'])
        );

        $query->execute($array);

        $query=$db->query("SELECT * FROM user WHERE id='".$db->lastInsertId()."'");
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC)[0];

        $_SESSION["currentUser"] = $resultat;

        header('Location: ../index.php');
        exit;
    }



}
header('Location: ../register.php');
exit;
