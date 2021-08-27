<?php

session_start();
require_once(dirname(__FILE__) . "/../Model/database.php");
require_once(dirname(__FILE__) . "/../Model/config.php");

$req = $db->prepare('INSERT INTO annonce(id, title, description, image, location, statut, author_id, created_at, prix) VALUES(:id, :title, :description, :image, :location, :statut, :author_id, :created_at, :prix)');
$req->bindParam(':id', $_POST["id"]);
$req->bindParam(':title', $_POST["title"]);
$req->bindParam(':description', $_POST["description"]);
$req->bindParam(':image', $_POST["image"]);
$req->bindParam(':location', $_POST["location"]);
$req->bindParam(':statut', $config['STATUTS'][0]);
$req->bindParam(':author_id', $_SESSION["id"]);
$req->bindParam(':created_at', $_POST["date"]);
$req->bindParam(':prix', $_POST["prix"]);
$req->execute();


$id = $db->lastInsertId();

header("Location: ../fiche-annonce.php?id=$id");
// var_dump($_POST);
// var_dump($_SESSION);
// var_dump($config);
