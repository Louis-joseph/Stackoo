<?php

session_start();
require_once(dirname(__FILE__) . "/../Model/database.php");

if ($_POST) {
    if (
        isset($_POST["title"]) && !empty($_POST["title"])
        && isset($_POST["image"]) && !empty($_POST["image"])
        && isset($_POST["created_at"]) && !empty($_POST["date"])
        && isset($_POST["prix"]) && !empty($_POST["prix"])
        && isset($_POST["description"]) && !empty($_POST["description"])
    ) {


        $id = strip_tags($_GET["id"]);
        $nom = strip_tags($_POST["title"]);
        $image = strip_tags($_POST["image"]);
        $description = strip_tags($_POST["date"]);
        $description = strip_tags($_POST["prix"]);
        $description = strip_tags($_POST["description"]);

        $sql = "UPDATE annonce SET title=:title, image=:image, created_at=:created_at, prix=:prix, description=:description WHERE id = :annonce_id";
        $query = $db->prepare($sql);
        $query->bindValue(":annonce_id", $annonce_id, PDO::PARAM_INT);
        $query->bindValue(":title", $title, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);
        $query->bindValue(":created_at", $date, PDO::PARAM_STR);
        $query->bindValue(":prix", $prix, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);

        $query->execute();

        header("Location: ../fiche-annonce.php");
    } else {
        echo "Remplissez tous les champs";
    }
}

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);
    // var_dump($id);
    $sql = "SELECT * FROM annonce WHERE id = :annonce_id";
    $query = $db->prepare($sql);
    $query->bindValue(":annonce_id", $annonce_id, PDO::PARAM_INT);

    $query->execute();
    $projet = $query->fetch();
    // on verifie si le projet existe

}
