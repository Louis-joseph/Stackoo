<?php
require_once("components/header.php");

?>

<body>
    <div id="form" class="container-fluid">
        <div class="row pt-6">
            <form action="" class="col-md-6">
                <h1>Je me connecte</h1>
    
                <div class="form-group">
                    <input type="text" name="pseudo"class="form-control" placeholder="Entrez votre pseudo">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password"class="form-control" placeholder="Entrez votre mot de passe">
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