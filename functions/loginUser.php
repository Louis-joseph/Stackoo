<?php
require_once(dirname(__FILE__) . "/../Model/database.php");
require_once(dirname(__FILE__) . "/../Model/config.php");

$passwordhasher = $_POST["password"] . $config["SECRET_KEY"];
$hasher = md5($passwordhasher);

//Je vais chercher mon utilisateur en fonction des informations
$req = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND password = :password");
//Je lui passe le "pseudo" et le "password"
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $hasher);
//Executer la requete
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

//Si l'utilisateur existe
if (!$result) {
    header("location: ../login.php?message=Identifiants pas bon 😂😂");
} else {
    //On va alimenter la session
    session_start();
    $_SESSION["pseudo"] = $result["pseudo"];
    $_SESSION["id"] = $result["id"];
    $_SESSION["role"] = $result["role"];
    header("location: ../index.php");
}
