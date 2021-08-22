<?php
require_once(dirname(__FILE__) . "/../Model/database.php");

//Si ce Post "password" est égale à Post "confirmPassword" dans ce cas la l'utilisateur est cool
//Si ils ont different on renvoie vers

if ($_POST["password"] !== $_POST["confirmPassword"]) {
    header("Location: ../register.php?message=Mot de passe non identique👀");
}
//Vérifier si le pseudo existe
$req = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $hasher);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
//Si result existe

if ($result) {
    $message = "Compte existe déja 🤔";
    header("Location; ../register.php?message=$message");
}

if (!$result) {
    //Appeller la fonction md5 pour encrypter le MDP
    $passwordhasher = $_POST["password"] . "d^7wgy^HQRqMn&78bA4@J";

    $hasher = md5($passwordhasher);

    //Si role existe on va lui attribuer un role sinon si la case n'est pas cocher non !

    if (isset($_POST["role"])) {
        $role = "StackooHelper";
    } else {
        $role = "StackooUser";
    }

    $req = $db->prepare("INSERT INTO user(pseudo, password, role) VALUE(:pseudo, :password, :role)");
    $req->bindParam(":pseudo", $_POST["pseudo"]);
    $req->bindParam(":password", $hasher);
    //Le Role dependra si la personne un cocher la case ou pas
    $req->bindParam(":role", $role);
    $req->execute();


    $message = "Compte crée 👋";
    header("Location: ../login.php?message=$message&type=success");
}
