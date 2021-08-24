<?php
session_start();

if (!isset($_SESSION["pseudo"])) {
    header("Location: login.php");
}

require_once("components/header.php");
require_once("components/navbar.php");
require_once('./Model/database.php');
require_once("functions/getUser.php");

//Affichage en fonction de l'identifiant
$req = $db->prepare("SELECT id, title, prix, image_url, author_id, location, description, statut, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM annonce WHERE id = :id");
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

        </div>
    </div>
</div>




<?php
require_once("components/footer.php");
?>