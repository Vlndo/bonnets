<?php
$pageTitle = "Liste";

$prixMini = null;
$prixMaxi = null;
$matiere = null;
$taille = null;

if (!empty($_POST['prixMini'])) {
    $prixMini = floatval($_POST['prixMini']);

    $produits = array_filter($produits, function (Beanie $bonnet) use ($prixMini) {
        return $bonnet->getPrix() >= $prixMini;
    });
}

if (!empty($_POST['prixMaxi'])) {
    $prixMaxi = floatval($_POST['prixMaxi']);
    $produits = array_filter($produits, function (Beanie $bonnet) use ($prixMaxi) {
        return $bonnet->getPrix() <= $prixMaxi;
    });
}

if (!empty($_POST['taille'])) {
    $produits = array_filter($produits, function (Beanie $bonnet) {
        return in_array($_POST['taille'], $bonnet->getTailles());
    });
}

if (!empty($_POST['matiere'])) {
    $produits = array_filter($produits, function (Beanie $bonnet) {
        return in_array($_POST['matiere'], $bonnet->getMatieres());
    });
}

?>

<form action="" method="POST" class="row g-3">
    <div>
        <select class="form-control" id="taille" name="taille">
            <option value="" selected>Selectionnez votre taille.</option>
            <?php foreach (Beanie::TAILLES as $taille) {
                ?>
                <option value="<?php echo $taille ?>" <?php if (isset($_POST['taille']) && $_POST['taille'] == $taille) {
                       ?> selected <?php
                   } ?>><?= $taille ?></option>
                <?php
            }
            ?>
        </select>
        <select class="form-control" name="matiere" id="matiere">
            <option value="" selected>Selectionnez votre matière.</option>
            <?php foreach (Beanie::MATIERE as $matiere) {
                ?>
                <option value="<?php echo $matiere ?>" <?php if (isset($_POST['matiere']) && $_POST['matiere'] == $matiere) {
                       ?> selected <?php
                   } ?>>
                    <?php
                    echo $matiere
                        ?>
                </option>
                <?php
            }
            ?>
        </select>
        <div>
            <label for="">prix minimum</label>
            <input name="prixMini" type="number" placeholder="Prix minimum" <?php if (isset($_POST['prixMini'])) {
                echo 'value = ' . $_POST['prixMini'];
            } ?>>
        </div>
        <div>
            <label for="">prix maximum</label>
            <input name="prixMaxi" type="number" placeholder="Prix maximum" <?php if (isset($_POST['prixMaxi'])) {
                echo 'value = ' . $_POST['prixMaxi'];
            } ?>>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

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