<?php
$pageTitle = "Connexion";
require_once 'includes/header.php';
?>

<?php
$_SESSION['username'] = $_POST['username'];
?>

<form action="" method="POST" class="row g-3">
    <div>
        <label for="username" class="form-label">Idantifiant</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div>
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id=password" name="password">
    </div>
        <button type="submit" class="btn btn-primary">Valider</button>
</form>


<?php
require_once 'includes/footer.php';
?>