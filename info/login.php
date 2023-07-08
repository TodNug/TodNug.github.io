<?php

session_start();

if(isset($_SESSION["user"])) {
    header("Location: reservations");
    exit;
}

if(!empty($_POST)){
  if(isset($_POST["pseudo"], $_POST["pass"])
  && !empty($_POST["pseudo"] && !empty($_POST["pass"]))
  ){
    require_once "connect.php";

    $_SESSION["error"] = [];

    $sql = "SELECT * FROM `logs` WHERE `username` = :username";

    $query = $db->prepare($sql);

    $query->bindValue(":username", $_POST["pseudo"], PDO::PARAM_STR);

    $query->execute();

    $user = $query->fetch();

        if(!$user) {
          $_SESSION["error"][] = "L'utilisateur et/ou le mot de passe est incorrect !";
        }

        if(!password_verify($_POST["pass"], $user["password"])){
          $_SESSION["error"][] = "L'utilisateur et/ou le mot de passe est incorrect !";
        }


      if($_SESSION["error"] === []){

        

            $_SESSION["user"] = [
            "ID" => $user ["ID"],
            "pseudo" => $user ["username"],
        ];

    header("location: reservations");
      }
      else{
        $_SESSION["error"] = ["L'utilisateur et/ou le mot de passe est incorrect !"];
      }
  }
  else{
      $_SESSION["error"] = ["Le formulaire est incomplet !"];
  }
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="/info/login.css" />
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
    <div class="bigctn">
      <div class="container">
        <h1>Se connecter</h1>
        <form method="post">
          <div>
            <input
              type="text"
              name="pseudo"
              id="username"
              placeholder="Identifiant"
            />
          </div>
          <div>
            <input
              type="password"
              name="pass"
              id="pass"
              placeholder="Mot de passe"
            />
          </div>
          <div class="error">
            <?php 
            if(isset($_SESSION["error"])){
              foreach($_SESSION["error"] as $error){
                ?>
                <p><?= $error ?></p>
                <?php

              }
              unset($_SESSION["error"]);
            }
            ?>
          </div>
          <button type="submit">Connexion</button>
        </form>
      </div>
    </div>
    <script src="login.js"></script>
  </body>
</html>

