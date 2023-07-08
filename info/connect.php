    <?php
        // constantes d'environnement
        
    define("DBHOST", "localhost");
	define("DBUSER", "simpybur_admin");
	define("DBPASS", "b{dC00@,YP1N");
	define("DBNAME", "simpybur_logs");

	// DSN de connexion
	$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

	// On va se connecter à la base

	try {
	    // On instancie PDO
	    $db = new PDO($dsn, DBUSER, DBPASS);
	    // on s'assure d'envoyer les données en UTF8

	    $db->exec("SET NAMES utf8");

	    // On définit le mode de "fetch" par défaut
	    $db->setAttribute(
	        PDO::ATTR_DEFAULT_FETCH_MODE,
	        PDO::FETCH_ASSOC
	    );

	} catch (PDOException $e) {
	    die("Erreur:".$e->getMessage());
	}


	?>
