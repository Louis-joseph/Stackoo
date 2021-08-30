<?php
require_once("components/header.php");
require_once("components/navbar.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Modifier une annonce</h1>

            <form action="functions/updateAnnonce.php" method="POST" class="form-group">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Entrez un titre">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="image" class="form-control" placeholder="Entrez une image">
                </div>
                <br>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Entrez une description"></textarea>
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Entrez une date">
                </div>
                <div class="form-group">
                    <input type="number" name="prix" class="form-control" placeholder="Entrez un prix">
                </div>
                <br>
                <input type="submit" value="Modifier vote annonce" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>



<?php
require_once("components/footer.php");

?>