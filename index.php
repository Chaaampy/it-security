<?php
session_start();

//include "treatment/Treatment.php";
//$lstFunctions = new Treatment();

if(isset($_SESSION['currentUser'])) { ?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Livre d or</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <main>
        <div class="messages">
            <h1>LIVRE D'OR</h1>
            <table border="1">
                <tr>
                    <th class="author">Auteur</th>
                    <th class="message">Message</th>
                </tr>
                <?php
                $db = new PDO("mysql:dbname=livreOr;host=localhost", 'root', '');
                $query = $db->query("SELECT * FROM message");

                foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $message) {
                    $req = $db->query("SELECT name FROM user where id = " . $message['idUser']);
                    $user = $req->fetchAll(PDO::FETCH_ASSOC);

                    ?>
                    <tr>
                        <td><?php echo $user[0]["name"] . " - " . $message["date"]; ?></td>
                        <td><?php echo $message["message"]; ?></td>
                    </tr>

                <?php } ?>


            </table>


        </div>
        <div class="form">
            <H2>Ecrire un nouveau message</H2>
            <form action="/treatment/newMessage.php" method="post">
                <textarea placeholder="Message" name="txtMessage" id="" cols="30" rows="10" required></textarea>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </main>

    </body>
    </html>
    <?php
}
else {
    header('Location: connection.php');
    exit;
}
