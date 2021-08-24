<?php

require_once(dirname(__FILE__) . "/../Model/database.php");
//Aller chercher l'utilisateur qui a telle identifiant
function getUser($user_id)
{
    //Variable "$db" pour la rendre accesible
    global $db;

    $req = $db->prepare("SELECT * FROM user WHERE id = :user_id");
    $req->bindParam(":user_id", $user_id);
    $req->execute();

    return $result = $req->fetch(PDO::FETCH_ASSOC);
}
