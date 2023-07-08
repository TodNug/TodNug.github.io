<?php
session_start();

if(!isset($_SESSION["user"])) {
    header("Location: login");
    exit;
}

require_once "connect.php";

$sql = "SELECT * FROM `infos_clients` ORDER BY `ID` DESC";

$query = $db->query($sql);

$messages = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réservations</title>
    <link rel="stylesheet" href="reservations.css" />
    <link rel="icon" href="../IMG_6387 (1).png" type="image/icon type" />
  </head>

  <body>
    <div class="logo">
      <div class="arrow-back">
        <img id="backarrow" src="../arrow.png" alt="retour" />
      </div>
      <a href="/">
        <img id="logo1" src="../logo_black.png" alt="logo" />
      </a>
    </div>
    <div class="title">
        <h1>Liste des réservations</h1>
    </div>
    <section>
        <div class="titles">
            <h3>Prénom :</h3>
            <h3>Adresse Email :</h3>
            <h3>Téléphone :</h3>
            <h3>A partir du :</h3>
            <h3>Jusqu'au :</h3>
            <h3>Message :</h3>
        </div>
<?php foreach($messages as $reservation): ?>
        <article>
            <a href="reservation?id=<?=$reservation["ID"]?>">
                <p><?= strip_tags($reservation["nom"])?></p>
                <p><?= strip_tags($reservation["mail"])?> </p>
                <p><?= strip_tags($reservation["phone"])?></p>
                <p><?= strip_tags($reservation["date1"])?></p>
                <p><?= strip_tags($reservation["date2"])?></p>
                <p id="msg" ><?= strip_tags($reservation["message"])?></p>
            </a>
        </article>
    <?php endforeach; ?>
    </section>
  <footer>
    <a href="logout">
      <p>Déconnexion</p>
    </a>
  </footer>
    <script src="reservations.js"></script>
  </body>
</html>