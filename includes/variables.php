<?php
require_once 'classes/Beanie.php';
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.';

$bonnet = new Beanie();
$bonnet->setNom('Bonnet en laine');
$bonnet->setPrix('10');
$bonnet->setDescription($description);
$bonnet->setImg('bonnet1.jpg');
$bonnet->setTailles(Beanie::TAILLES);
$bonnet->setMatieres(Beanie::MATIERE);

$bonnet2 = new Beanie();
$bonnet2->setNom('Bonnet en laine bio');
$bonnet2->setPrix(14);
$bonnet2->setDescription($description);
$bonnet2->setImg("bonnet2.jpg");
$bonnet->setTailles(['L', 'XL']);
$bonnet->setMatieres(Beanie::MATIERE);

$bonnet3 = new Beanie();
$bonnet3->setNom('Bonnet en laine et cachemire');
$bonnet3->setPrix(20);
$bonnet3->setDescription($description);
$bonnet3->setImg('bonnet3.jpg');
$bonnet->setTailles(['S']);
$bonnet->setMatieres(Beanie::MATIERE);

$bonnet4 = new Beanie();
$bonnet4->setNom('Bonnet arc-en-ciel');
$bonnet4->setPrix(12);
$bonnet4->setDescription($description);
$bonnet4->setImg('bonnet4.jpg');
$bonnet->setTailles(['S', 'M']);
$bonnet->setMatieres(Beanie::MATIERE);


$produits = [
    $bonnet,
    $bonnet2,
    $bonnet3,
    $bonnet4
];
$mdp = 'toto';
?>