<?php
$panier = new Panier();

$isPanierModifie = $panier->handle($_GET);
if ($isPanierModifie) {
    header('location:?page=panier');
}

?>
<table class="table">
    <tr>
        <th>Nom du produit</th>
        <th>Prix TTC</th>
        <th>Quantité</th>
        <th>Prix total</th>
    </tr>
    <?php
    foreach ($panier->getContent() as $id => $quantite) {
        if (isset($produits[$id])) {
            $produit = $produits[$id];
            ?>
            <tr>
                <td>
                    <?php
                    echo $produit->getNom();
                    ?>
                </td>
                <td>
                    <?php
                    echo number_format(tva($produit->getPrix())) . " €";
                    ?>
                </td>
                <td>
                    <a href="?page=panier&id=<?php echo $id; ?>&mode=moins">-</a>
                    <?php
                    echo $quantite;
                    ?>
                    <a href="?page=panier&id=<?php echo $id; ?>&mode=plus">+</a>
                </td>
                <td>
                    <?php
                    echo number_format(tva($produit->getPrix())) * $quantite . " €";
                    ?>
                </td>
                <td>
                    <a href="?page=panier&id=<?php echo $id; ?>&mode=delete-line" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <?php
    }
    ?>
</table>
<a class="btn btn-primary" href="?page=panier&mode=empty">Vider panier</a>