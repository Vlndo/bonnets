<?php
// $pageTitle = "Bienvenue !";
require_once 'includes/header.php';
?>

    <table>
        <tr>
            <th>Produits</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Descripion</th>
        </tr>
            <?php
                foreach ($produits as $index => $produit) {
                        addLine($index, $produit);
                }
            ?>
    </table>

<?php
require_once 'includes/footer.php';
?>
