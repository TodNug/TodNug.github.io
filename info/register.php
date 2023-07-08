<?php

session_destroy();

if(!empty($_POST)) {
    // Le formulaire à été envoyé
    // On vérifie que tous les champs requis sont remplis
    if(isset($_POST["pseudo"], $_POST["pass"])
        && !empty($_POST["pseudo"]) &&
        !empty($_POST["pass"])
    ) {
        // Le formulaire est complet
        // On récupère les données en les protégeant
        $pseudo = strip_tags($_POST["pseudo"]);

        // On va hasher le mot de passe
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        // On enregistre en bdd
        require_once "connect.php";

        $sql = "INSERT INTO `logs`(`username`, `password`) VALUES (:pseudo, '$pass')";

        $query = $db->prepare($sql);

        $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);

        $query->execute();

        // On récupère l'id du nouvel utilisateur
        $id = $db->lastInsertId();

        // On connectera l'utilisateur

        // On démarre la session php
        // session_start();

        // On stocke dans $_SESSION les informations de l'utilisateur
        $_SESSION["user"] = [
            "ID" => $user ["ID"],
            "pseudo" => $pseudo,
        ];
        
        // On redirige vers la page de profil
        
        header("location: login");
        
    } else {
        die("rempli bien le boss");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Sign up</h1>

    <form method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="pseudo" id="username">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="pass" id="pass">
        </div>
        <button type="submit">Sign Up</button>
    </form>

</body>

</html>