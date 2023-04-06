<!DOCTYPE html>

<?php
require_once 'includes/variables.php';
require_once 'includes/functions.php';

if(!isset($pageTitle)){
    $pageTitle = "Bienvenue ! ";
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php $pageTitle ; ?> Document</title>
</head>
<body>