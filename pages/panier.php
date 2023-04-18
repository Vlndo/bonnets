<?php

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$panier = $_SESSION['panier'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!isset($panier[$id])) {
        $panier[$id] = 0;
    }
    $panier[$id]++;
    header('location:?page=panier');
}

$_SESSION['panier'] = $panier;

var_dump($panier);
?>