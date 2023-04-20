<?php
session_start();
require_once 'includes/variables.php';
require_once 'includes/functions.php';

if (!isset($pageTitle)) {
    $pageTitle = "Bienvenue ! ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <title>
        <?php echo $pageTitle; ?> - Mes beaux bonnets
    </title>
</head>

<body>
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="?page=home">Accueil</a>
                <a class="navbar-brand" href="?page=list">Liste</a>
                <a class="navbar-brand" href="
                <?php
                if (isset($_GET['connexion']) && $_GET["connexion"] == "success") {
                    ?>?page=contact
                    <?php
                } else {
                    ?>
                    ?page=login
                    <?php
                }
                ?>
                ">Contactez-nous</a>
                <a class="navbar-brand" href="?page=panier">Panier</a>
                <a class="navbar-brand" href="?page=login">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                        ?>
                        <a class="navbar-brand" href="?page=logout">Déconnexion</a>
                        <?php
                    } else {
                        echo "Connexion";
                    }
                    ?>
                </a>

            </div>
        </nav>
        <?php
        if (isset($_GET['connexion']) && $_GET["connexion"] == "success") {
            ?>
            <div class="alert alert-success" role="alert">
                <p>Bienvenue
                    <?php echo $_SESSION['username']; ?>
                </p>
            </div>
            <?php
        }
        if (isset($_GET['contact']) && $_GET["contact"] == "success") {
            ?>
            <div class="alert alert-success" role="alert">
                <p>Message envoyé, merci
                    <?php echo $_SESSION['username']; ?> pour votre temps !
                </p>
            </div>
            <?php
        }
        ?>
    </div>