<?php
require_once(dirname(__FILE__) . "/../Model/database.php");

//Selectionner un utilisateur avec ce pseudo là et ce password

$req = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND password = :password");

//Renseigner les parametres

$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);

//Executer la requete

$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

//Si l'utilisateur n'existe pas

if (!$result) {
    header("location: ../login.php?message=Identifiants pas bon 😂😂");
} else {
    session_start();

    $_SESSION["pseudo"] = $result["pseudo"];
    header("location: ../index.php");
}
