<?php
session_start();

if (!isset($_SESSION["pseudo"])) {
    header("Location: login.php");
}

require_once("components/header.php");
require_once("components/navbar.php");
require_once('./Model/database.php');
require_once("functions/getUser.php");
require_once("Model/config.php");

//Affichage en fonction de l'identifiant
$req = $db->prepare("SELECT id, title, prix, image_url, author_id, helper_id, location, description, statut, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM annonce WHERE id = :id");
$req->bindParam(':id', $_GET["id"]);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);
$user = getUser($result["author_id"]);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $result["image_url"] ?>" alt="">
        </div>
        <div class="col-md-6">
            <h2><?= $result["title"] ?><span class="badge bg-light text-dark"><?= $result["statut"] ?></span></h2>
            <p><?= $user["pseudo"] ?> - <?= $result["location"] ?> - <?= $result["created_at_format"] ?> </p>
            <p>
                <?= $result["description"] ?>
            </p>
            <!-- S'il s'agit du proprio de l'annonce/Afficher les boutons d'edit -->
            <?php if ($_SESSION["id"] === $result["author_id"] && $result["statut"] !== $config["STATUTS"][2]) : ?>
                <a href="" class="btn btn-danger">Supprimer</a>
                <a href="" class="btn btn-primary">Archiver</a>
            <?php endif ?>
            <!-- Si l'article est archiver on va pouvoir le supprimer -->
            <?php if ($_SESSION["id"] === $result["author_id"] && $result["statut"] === $config["STATUTS"][2]) : ?>
                <a href="" class="btn btn-danger">Supprimer</a>
            <?php endif ?>




            <?php if ($_SESSION["role"] === $config["ROLES"][1] && $result["statut"] === $config["STATUTS"][0]) : ?>
                <a href="">Particper</a>
            <?php endif ?>

            <?php if ($_SESSION["role"] === $config["ROLES"][1] && $result["statut"] === $config["STATUTS"][1]) : ?>
                <?php if ($_SESSION["id"] === $result["helper_id"]) : ?>
                    <a href="" class="btn btn-danger">Annuler</a>
                <?php else : ?>

                <?php endif ?>
            <?php endif ?>

        </div>
    </div>
</div>

<?php
var_dump($_SESSION);
var_dump($result);
require_once("components/footer.php");
?>