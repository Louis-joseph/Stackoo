<?php
require_once(dirname(__FILE__) . "/../Model/database.php");


//Supprime moi une annonce lorsque where id = a annonce id
$req = $db->prepare("DELETE FROM annonce WHERE id = :annonce_id ");
//Je selectionne la requete pr lui passer un parametre et sa valeur sera ce que l'on reçoit via l'url
$req->bindParam(":annonce_id", $_GET["annonce_id"]);
$req->execute();

header("Location: ../main.php");
exit();
