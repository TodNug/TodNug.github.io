<?php
session_start();

if(!empty($_POST)){

  if(isset($_POST["nom"], $_POST["email"], $_POST["phone"], $_POST["date1"], $_POST["date2"], $_POST["message"])
        && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["date1"]) && !empty($_POST["date2"])
      ){
      $nom = strip_tags($_POST["nom"]);

      $_SESSION["error"] = [];

      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        die ("L'adresse email n'est pas valide !");
      }

      $phone = strip_tags($_POST["phone"]);

      $date1 = strip_tags($_POST["date1"]);
      $date2 = strip_tags($_POST["date2"]);

      $message = strip_tags($_POST["message"]);

      require_once "connect.php";

      $sql = "INSERT INTO `infos_clients`(`nom`, `mail`, `phone`, `date1`, `date2`, `message`) VALUES (:nom, :email, :phone, :date1, :date2, :message )";

      $query = $db->prepare($sql);

      $query->bindValue(":nom", $nom, PDO::PARAM_STR);

      $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

      $query->bindValue(":phone", $phone, PDO::PARAM_STR);

      $query->bindValue(":date1", $date1, PDO::PARAM_STR);

      $query->bindValue(":date2", $date2, PDO::PARAM_STR);

      $query->bindValue(":message", $message, PDO::PARAM_STR);

      $query->execute();

      
      }

}

  ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire de Réservation</title>
    <link rel="stylesheet" href="form.css" />
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
    <div class="container">
      <form
        method="post"
        id="form1">
        <div class="after-submit">
          <h2>Message envoyé !</h2>
          <h4>
            Les informations nous ont bien été envoyés. Vous allez recevoir une
            réponse au plus vite ! <br />
          </h4>
          <p>
            *Les dates de réservation peuvent être déjà prises, dans quel cas
            nous vous préviendront par message.
          </p>
        </div>
        <div class="title">
          <h1>Formulaire de réservation</h1>
          <h4>
            Pour réserver, vous pouvez nous appeler au 06 18 74 14 40, ou
            remplir ce formulaire. Nous vous recontacterons au plus vite par
            message.
          </h4>
        </div>
        <input type="text" id="name" name="nom" placeholder="Votre nom" required />
        <input type="email" id="email" name="email" placeholder="Votre mail" required />
        <input
          type="text"
          id="phone"
          name="phone"
          placeholder="Votre numéro de téléphone"
          required
        />
        <div class="date">
          <div class="date1">
            <p>Du :</p>
            <input type="date" name="date1" id="date1" required />
          </div>
          <div class="date2">
            <p id="date2text">Au :</p>
            <input type="date" name="date2" id="date2" required />
            <h5>(jour du départ)</h5>
          </div>
        </div>
        <textarea
          id="message"
          name="message"
          rows="4"
          placeholder="Que désiriez vous ?"
        ></textarea>
        <button id = "click" type="submit">Envoyer</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
    crossorigin="anonymous"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="form.js"></script>
  </body>
</html>
