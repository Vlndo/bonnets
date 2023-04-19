<?php
$pageTitle = "Accueil";
?>
<div class="container-fluid d-flex p-5 col-12 justify-content-around">
    <?php
    foreach ($produits as $id => $produit) {
        if ($id >= 3) {
            break;
        }
        ?>
        <div class="card" style="width: 18rem;">
            <img src="img/<?php echo $produit["img"] ?>" class="card-img-top" alt="bonnet">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $produit['nom_produit']; ?>
                </h5>
                <p class="card-text">
                    <?php echo $produit['description_produit']; ?>
                </p>
                <a href="?page=panier&id=<?php echo $id; ?>" class="btn btn-primary">Ajouter au panier</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<div class="d-flex justify-content-center">
    <a href="?page=list" class="btn btn-primary">Voir tout</a>
</div>