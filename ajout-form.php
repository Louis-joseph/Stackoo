<?php
require_once("components/header.php");
require_once("components/navbar.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Ajouter une annonce</h1>

            <form action="functions/addAnnonce.php" method="POST" class="form-group">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Entrez votre titre">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="image" class="form-control" placeholder="Entrez votre image">
                </div>
                <br>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Entrez votre description"></textarea>
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Entrez une date">
                </div>
                <div class="form-group">
                    <input type="number" name="prix" class="form-control" placeholder="Entrez un prix">
                </div>
                <div class="form-group">
                    <select name="location" id="" class="form-control">
                        <option value="Poitiers">Poitiers</option>
                        <option value="Dunkerque">Dunkerque</option>
                        <option value="Limoges">limoges</option>
                        <option value="Orléans">Orléans</option>
                        <option value="Sedan">Sedan</option>
                    </select>
                </div>
                <br>
                <input type="submit" value="Créer vote annonce" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>



<?php
require_once("components/footer.php");

?>