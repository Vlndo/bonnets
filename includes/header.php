<!DOCTYPE html>

<?php
require_once 'includes/variables.php';
require_once 'includes/functions.php';

if(!isset($pageTitle)){
    $pageTitle = "Bienvenue ! ";
};
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title><?php echo $pageTitle; ?> - Mes beaux bonnets</title>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <a class="navbar-brand" href="list.php">Liste</a>
        <a class="navbar-brand" href="login.php">
<?php
            if (isset($_POST['username'])) {
                echo $_POST['username'];
            } else {
                echo "Connexion";
            }
?>
        </a>
        </div>
    </nav>
    </div>