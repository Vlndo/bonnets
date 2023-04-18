<?php
function tva($prix)
{
    return $prix / 1.2;
}
;

function addLine(int $id, array $produit): void
{
    ?>
    <tr>
        <td>
            <?php
            echo $produit['nom_produit'];
            ?>
        </td>
        <td <?php
        if ($produit['prix_produit'] <= 12) {
            echo "class = 'green'";
        } else {
            echo "class = 'blue'";
        }
        ;
        ?>>
            <?php
            echo $produit['prix_produit'] . " €";
            ?>
        </td>
        <td>
            <?php
            echo number_format(tva($produit['prix_produit'])) . " €";
            ?>
        </td>
        <td>
            <?php
            echo $produit['description_produit'];
            ?>
        </td>
        <td>
            <a class="btn btn-primary" href="?page=panier&id=<?php echo $id; ?>">Ajouter au panier</a>
        </td>
    </tr>
    <?php
}
;
?>