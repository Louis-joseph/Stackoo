<?php
session_start();

if (!isset($_SESSION["pseudo"])) {
    // header("Location: login.php");
}

require_once("components/header.php");
require_once("components/navbar.php");
require_once("components/home.php");
require_once("components/layout.php");
require_once("Model/config.php");
require_once("functions/getUser.php");
require_once("Model/database.php");

?>

<!-- 576 XS - > 576px S > 768px M > 992px L > 1200px Extra Large-->
<div class="container">
    <h1>Trouvez la bonne affaire</h1>
    <div class="row">

        <?php
        //Affichage en fonction du statut
        $req = $db->prepare("SELECT id, title, prix, image, author_id, location, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM annonce WHERE statut = :statut ORDER BY created_at DESC");
        $req->bindParam(':statut', $config["STATUTS"][0]);
        $req->execute();

        while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="col-md-4 col-sm-6">
                <div class="card mb-4 shadow-sm">
                    <a href="fiche-annonce.php?id=<?= $result["id"] ?>">
                        <img src="<?= $result["image"] ?>" class="w-100" alt="image_annonce">
                    </a>
                    <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia quasi dolorum, distinctio soluta accusamus numquam quas harum ex minus voluptatum.
                        </p>
                        <h5 class="card-title"><?= $result["title"] ?></h5>
                        <p class="card-text"><?= $result["prix"] ?>€</p>
                        <div class="btn-group">

                            <?php
                            $user = getUser($result["author_id"]);
                            ?>

                            <button type="button" class="btn btn-sm btn-outline-secondary"><?= $user["pseudo"] ?> - <?= $result["location"] ?>
                                Contacter
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-secondary ml-1"><?= $result["created_at_format"] ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>