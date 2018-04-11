<?php
session_start();
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 11/04/18
 * Time: 10:36
 */

if(isset($_POST['login']) && isset($_POST['pwd'])){

    $username = 'root';
    $password = '';
    $host = 'localhost';
    $db = 'livreOr';

    $db = new PDO("mysql:dbname=$db;host=$host", $username, $password);
    $query=$db->query("SELECT * FROM user WHERE name='".$_POST['login']."'");
    //return var_dump($query);
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

    if(count($resultat)> 0){

        if($resultat[0]['password'] == md5($_POST['pwd']) ){
            $_SESSION["currentUser"] = $resultat[0];
            header('Location: ../index.php');
            exit;
        }
    }
}
header('Location: ../connection.php');
exit;
