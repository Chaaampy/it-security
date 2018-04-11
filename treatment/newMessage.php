<?php
session_start();
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 11/04/18
 * Time: 11:45
 */


if(isset($_SESSION['currentUser']) && isset($_POST['txtMessage'])){
    $db = new PDO("mysql:dbname=livreOr;host=localhost", 'root', '');
    $query = $db->prepare("INSERT INTO message(idUser, message) VALUES (:idUser, :message)");

    $array = array(
        ':idUser' => intval($_SESSION['currentUser']['id']),
        ':message' => $_POST['txtMessage']);

    $query->execute($array);


    header('Location: ../index.php');
    exit;


}
elseif(isset($_SESSION['connected'])){
    header('Location: ../index.php');
    exit;
}
else{
    header('Location: ../connection.php');
    exit;
}