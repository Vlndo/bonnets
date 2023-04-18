<?php
$pageTitle = "Liste";
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