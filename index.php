<?php
session_start();

if (!isset($_SESSION["pseudo"])) {
    header("Location: login.php");
}
require_once("components/header.php");
require_once("components/navbar.php");
require_once("Model/database.php");
require_once("Model/config.php");
require_once("functions/getUser.php");

?>

<div class="container">
    <h1>Trouvez la bonne affaire</h1>
    <div class="row">

        <?php
        $req = $db->prepare("SELECT id, title, prix, image_url, author_id, location, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM annonce WHERE statut = :statut ORDER BY created_at DESC");
        $req->bindParam(':statut', $config["STATUS"][0]);
        $req->execute();

        while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="col-md-4">

                <div class="card" style="width: 18rem;">
                    <img src="<?= $result["image_url"] ?>" class="card-img-top" alt="image_annonce">
                    <div class="card-body">
                        <a href="fiche-annonce.php">
                            <h5 class="card-title"><?= $result["title"] ?></h5>
                        </a>
                        <p class="card-text"><?= $result["prix"] ?>€</p>

                        <p class="card-text">

                            <?php
                            $user = getUser($result["author_id"]);
                            ?>

                            <small class="text muted"><?= $user["pseudo"] ?> - <?= $result["location"] ?></small>
                            <br>
                            <small class="text muted"><?= $result["created_at_format"] ?></small>
                        </p>
                        <a href="#" class="btn btn-primary">Description</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
</div>

<?php
require_once("components/footer.php");
?>

<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum illum ad amet cumque doloribus nemo veniam modi quos perferendis temporibus ratione fugiat, minus deleniti nam sed, explicabo asperiores rerum unde.
Earum alias facilis dolorum blanditiis, sequi, cum cupiditate unde necessitatibus iste ipsum cumque numquam aliquam rem dolor temporibus, ipsa vitae? Quia nemo soluta magni eveniet eum ut optio, harum itaque.
Est nulla cupiditate autem repellat nisi magni beatae adipisci! Placeat adipisci animi quo porro provident eum cum alias beatae esse voluptas sunt rem, vero repellendus officia, exercitationem error. Quas, minima.
Laborum blanditiis possimus amet repellendus fugiat consequuntur, animi aut veniam assumenda iure debitis illo veritatis totam nihil ex nobis tenetur autem illum fuga dolores doloremque tempore repudiandae! Nostrum, amet fugit!
Veniam quae odit et porro voluptatum, eveniet nihil aperiam eaque in consequatur consequuntur esse assumenda, temporibus recusandae itaque pariatur. Non voluptate esse quia quaerat porro vitae possimus ea animi sapiente.
Corrupti libero in voluptatem vel unde temporibus similique suscipit ea nulla reprehenderit, praesentium dolorum ullam facere assumenda labore eos nisi deserunt sequi, sunt numquam necessitatibus cum earum dolor? Perspiciatis, beatae.
Animi quaerat quasi, laudantium cumque quis consequuntur aliquam, molestiae sequi delectus sunt a praesentium eveniet eos. Distinctio rem atque, voluptas incidunt eaque, earum ratione non beatae esse sapiente, ut dignissimos.
Voluptatum quae repellat provident soluta debitis culpa eligendi tempora facere mollitia ut minus ex velit quod sunt iste ipsum ad iure doloribus dolores, atque error nobis nisi incidunt? Aut, ullam.
Magnam ullam quis totam nesciunt, vitae voluptas quidem soluta hic mollitia eveniet aliquam nostrum doloribus necessitatibus velit natus tempora, quibusdam aspernatur expedita cupiditate amet ea nisi autem iusto. Maxime, magni.
Quae enim ipsam reprehenderit quidem aut perspiciatis vero? Modi doloribus quisquam officiis labore quod eaque odit! Sit error laudantium et, repellendus aliquid libero laborum voluptates eveniet, doloribus maxime sunt hic? -->