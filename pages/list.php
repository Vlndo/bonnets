<?php
$pageTitle = "Liste";

$prixMini = null;
$prixMaxi = null;
$matiere = null;
$taille = null;
$filtre = new BeanieFilter($_POST, $produits);

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
    foreach ($filtre->getBonnetFiltre() as $id => $produit) {
        addLine($id, $produit);
    }
    ?>
</table>