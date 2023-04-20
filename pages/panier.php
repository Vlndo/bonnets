<?php

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$panier = $_SESSION['panier'];

if (!isset($_GET['mode']) || $_GET['mode'] == 'plus') {
    $mode = 'plus';
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'moins') {
    $mode = 'moins';
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'delete') {
    $mode = 'delete';
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'delete-line') {
    $mode = 'delete-line';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!isset($panier[$id])) {
        $panier[$id] = 0;
    }

    if ($mode == 'plus') {
        $panier[$id]++;
    } elseif ($mode == 'delete-line') {
        unset($panier[$id]);
    } elseif ($mode == 'moins') {
        $panier[$id]--;
        if ($panier[$id] <= 0) {
            unset($panier[$id]);
        }
    }

    header('location:?page=panier');
}

if ($mode == 'delete') {
    $panier = [];
}

$_SESSION['panier'] = $panier;

?>
<table class="table">
    <tr>
        <th>Nom du produit</th>
        <th>Prix TTC</th>
        <th>Quantité</th>
        <th>Prix total</th>
    </tr>
    <?php
    foreach ($produits as $id => $produit) {
        if (isset($panier[$id])) {
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
                    echo $panier[$id];
                    ?>
                    <a href="?page=panier&id=<?php echo $id; ?>&mode=plus">+</a>
                </td>
                <td>
                    <?php
                    echo number_format(tva($produit->getPrix())) * $panier[$id] . " €";
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
<a class="btn btn-primary" href="?page=panier&mode=delete">Vider panier</a>