<?php
require_once("components/header.php");

?>

<body>
    <div id="form" class="container-fluid">
        <div class="row pt-6">
            <form action="" class="col-md-6">
                <h1>Créer un compte</h1>
    
                <div class="form-group">
                    <input type="text" name="pseudo"class="form-control" placeholder="Entrez votre pseudo">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password"class="form-control" placeholder="Entrez votre mot de passe">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="confirmPassword"class="form-control" placeholder="Confirmez votre mot de passe">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="role" id="role" class="form-check-input">
                    <label for="role">Je souhaite devenir un Stackoo Helper!</label>
                </div>
                <br>
                <div class="form-group">
                    <a href="login.php" class="btn btn-warning">Connexion</a>
                    <input type="submit" value="Créer mon compte" class="btn btn-primary">
                </div>
            </form>
            <div class="col-md-6 text-center">
    
            </div>
        </div>
    </div>
    
    <?php

    require_once("components/footer.php");

    ?>
