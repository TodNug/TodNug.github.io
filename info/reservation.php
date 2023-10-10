<?php

session_start();


if(!isset($_SESSION["user"])) {
    header("Location: login");
    exit;
}

require_once "connect.php";


$id = $_GET["id"];

$sql = "SELECT * FROM `infos_clients` WHERE `ID` = :ID";

$query = $db->prepare($sql);

$query->bindValue(":ID", $id, PDO::PARAM_INT);

$query->execute();

$reservation = $query->fetch();

if(!$reservation){
    http_response_code(404);
    echo "Article inéxistant";
    exit;
}

$titre = strip_tags($reservation["nom"]);


?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservation de <?= $titre?></title>
    <link rel="stylesheet" href="reservation.css" />
    <link rel="icon" href="../IMG_6387 (1).png" type="image/icon type" />
  </head>


  <body>
    <div class="logo">
      <div class="arrow-back">
        <img id="backarrow" src="../arrow.png" alt="retour" />
      </div>
      <a href="/">
        <img id="logo1" src="../logo_black.webp" alt="logo" />
      </a>
    </div>
    <div class="titre">
    <h2>Réservation de <?= strip_tags($reservation["nom"])?></h2>
    </div>
    <div class="contact">
        <div class="title">
            <h3>Nom :</h3>
            <h3>Mail :</h3>
            <h3>Téléphone :</h3>
            <h3>Du :</h3>
            <h3>Jusqu'au :</h3>
            <h3>Message :</h3>
        </div>
        <article>
            <p><?= strip_tags($reservation["nom"])?></p>
            <p><?= strip_tags($reservation["mail"])?> </p>
            <p><?= strip_tags($reservation["phone"])?></p>
            <p><?= strip_tags($reservation["date1"])?></p>
            <p><?= strip_tags($reservation["date2"])?></p>
            <p id="msg" ><?= strip_tags($reservation["message"])?></p>
        </article>
      </div>
    <script src="reservation.js"></script>
  </body>
</html>