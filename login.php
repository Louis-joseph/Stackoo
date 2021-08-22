<?php
require_once("components/header.php");

?>

<body>
    <div id="form" class="container-fluid">
        <div class="row pt-6">
            <form action="functions/loginUser.php" class="col-md-6" method="POST">
                <h1>Je me connecte</h1>

                <?php if (isset($_GET["message"])) : ?>
                    <?php
                    if (isset($_GET["type"]) && ($_GET["type"]) === "success") {
                        $classMessage = "alert alert-success alert-dismissible fade show";
                    } else {
                        $classMessage = "alert alert-danger alert-dismissible fade show";
                    }
                    ?>
                    <div class="<?= $classMessage ?>" role="alert">
                        <?= $_GET["message"] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php endif ?>

                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Entrez votre pseudo">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
                </div>
                <br>
                <div class="form-group">
                    <a href="register.php" class="btn btn-warning">Crée un compte</a>
                    <input type="submit" value="Je me connecte" class="btn btn-primary">
                </div>
            </form>
            <div class="col-md-6 text-center">

            </div>
        </div>
    </div>

    <?php

    require_once("components/footer.php");

    ?>