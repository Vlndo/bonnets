<?php
$errors = [];

if (isset($_POST["sujet"]) && isset($_POST["sujet"])) {
    if (empty($_POST['sujet'])) {
        $errors[] = "Veuillez remplir le champ 'sujet'.";
    }
    if (empty($_POST["mail"]) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Entrez un mail valide";
    }
    if (empty($_POST['message'])) {
        $errors[] = "Veuillez remplir le champ 'message'.";
    }
    if (empty($errors)) {
        $_SESSION['sujet'] = $_POST['sujet'];
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['message'] = $_POST['message'];
        header("Location: index.php?page=home&contact=success");
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
        <label for="sujet" class="form-label">Sujet</label>
        <input type="text" class="form-control" id="sujet" name="sujet">
    </div>
    <div>
        <label for="mail" class="form-label">Email</label>
        <input type="email" class="form-control" id="mail" name="mail">
    </div>
    <div>
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>