<?php
$pageTitle = "Connexion";
require_once 'includes/header.php';
$errors = [];

if (isset($_POST["password"]) && isset($_POST["username"])) {
    if ($_POST['password'] != $mdp) {
        $errors[] = "Mauvais mot de passe";
    }
    if (empty($_POST["username"])) {
        $errors[] = "Entrez un identifiant";
    }
    if (empty($errors)) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: index.php?page=home");
    }
}
foreach ($errors as $index => $error) {
    ?>
    <div class="alert alert-danger" role="alert">
        <p>
            <?php echo $error; ?>
        </p>
    </div>
    <?php
}
?>


<form action="" method="POST" class="row g-3">
    <div>
        <label for="username" class="form-label">Idantifiant</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div>
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<?php
require_once 'includes/footer.php';
?>