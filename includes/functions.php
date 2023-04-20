<?php
function tva($prix)
{
    return $prix / 1.2;
}
;

function addLine(int $id, Beanie $produit): void
{
    ?>
    <tr>
        <td>
            <?php
            echo $produit->getNom();
            ?>
        </td>
        <td <?php
        if ($produit->getPrix() <= 12) {
            echo "class = 'green'";
        } else {
            echo "class = 'blue'";
        }
        ;
        ?>>
            <?php
            echo $produit->getPrix() . " €";
            ?>
        </td>
        <td>
            <?php
            echo number_format(tva($produit->getPrix())) . " €";
            ?>
        </td>
        <td>
            <?php
            echo $produit->getDescription();
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