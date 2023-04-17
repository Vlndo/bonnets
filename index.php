<?php
$pageTitle = "Accueil";
require_once 'includes/header.php';
$i = 0;
?>
<div class="container-fluid d-flex p-5 col-12 justify-content-around">
<?php
    foreach ($produits as $i => $produit) {
        $i++;
        if ($i > 3) {
            break;
        }
?>
        <div class="card" style="width: 18rem;">
            <img src="img/<?php echo $produit["img"]?>" class="card-img-top" alt="bonnet">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
<?php
    }
?>
</div>
<div class="d-flex justify-content-center">
    <a href="list.php" class="btn btn-primary">Voir tout</a>
</div>
<?php
require_once 'includes/footer.php';
?>