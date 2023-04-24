<?php
$pageTitle = "Liste";
var_dump($_POST);
if (!empty($POST['prixMini'])) {
    $produits = array_filter($produits, function (Beanie $bonnet) {
        return $bonnet->getPrix() >= $_POST['prixMini'];
    });
}

if (!empty($_POST['prixMaxi'])) {
    $produits = array_filter($produits, function (Beanie $bonnet) {
        return $bonnet->getPrix() <= $_POST['prixMaxi'];
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
            <option value="">Selectionnez votre taille.</option>
            <?php foreach (Beanie::TAILLES as $taille) {
                ?>
                <option value="<?php echo $taille ?>"><?= $taille ?></option>
                <?php
            }
            ?>
        </select>
        <select class="form-control" name="matiere" id="matiere">
            <option value="">Selectionnez votre matière.</option>
            <?php foreach (Beanie::MATIERE as $matiere) {
                ?>
                <option value="<?php echo $matiere ?>"><?php echo $matiere ?></option>
                <?php
            }
            ?>
        </select>
        <div>
            <label for="">prix minimum</label>
            <input name="prixMini" type="number" placeholder="Prix minimum">
        </div>
        <div>
            <label for="">prix maximum</label>
            <input name="prixMaxi" type="number" placeholder="Prix maximum">
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