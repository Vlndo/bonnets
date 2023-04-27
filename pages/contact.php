<?php
$contact = new Contact($_POST);

if ($contact->isSubmitted() && $contact->isValid()) {
    $_SESSION['sujet'] = $_POST['sujet'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['message'] = $_POST['message'];
    header("Location: index.php?page=home&contact=success");
}


foreach ($contact->getErrors() as $error) {
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
        <input type="text" class="form-control" id="sujet" name="sujet" value="<?php echo $contact->getSujet(); ?>">
    </div>
    <div>
        <label for="mail" class="form-label">Email</label>
        <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $contact->getMail(); ?>">
    </div>
    <div>
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>