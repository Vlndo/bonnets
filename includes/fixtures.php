<?php
require_once 'config.inc.php';

spl_autoload_register(function ($class) {
    require_once "../classes/$class.php";
});

$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.';

$bonnet = new Beanie();
$bonnet->setNom('Bonnet en laine');
$bonnet->setPrix('10');
$bonnet->setDescription($description);
$bonnet->setImg('bonnet1.jpg');
$bonnet->setTailles(Beanie::TAILLES);
$bonnet->setMatieres(['laine']);

$bonnet2 = new Beanie();
$bonnet2->setNom('Bonnet en laine bio');
$bonnet2->setPrix(14);
$bonnet2->setDescription($description);
$bonnet2->setImg("bonnet2.jpg");
$bonnet2->setTailles(['L', 'XL']);
$bonnet2->setMatieres(['laine']);

$bonnet3 = new Beanie();
$bonnet3->setNom('Bonnet en laine et cachemire');
$bonnet3->setPrix(20);
$bonnet3->setDescription($description);
$bonnet3->setImg('bonnet3.jpg');
$bonnet3->setTailles(['S']);
$bonnet3->setMatieres(['laine', 'cachemire']);

$bonnet4 = new Beanie();
$bonnet4->setNom('Bonnet arc-en-ciel');
$bonnet4->setPrix(12);
$bonnet4->setDescription($description);
$bonnet4->setImg('bonnet4.jpg');
$bonnet4->setTailles(['S', 'M']);
$bonnet4->setMatieres(['soie', 'coton']);


$produits = [
    $bonnet,
    $bonnet2,
    $bonnet3,
    $bonnet4
];

$sql = "INSERT INTO `beanie`(`nom`, `prix`, `description`, `image`, `tailles`, `matieres`) VALUES (:nom, :prix, :description, :image, :tailles, :matieres) ";

$statement = $connection->prepare($sql);

foreach ($produits as $produit) {

    $statement->bindValue(':nom', $produit->getNom(), PDO::PARAM_STR);
    $statement->bindValue(':prix', $produit->getPrix(), PDO::PARAM_INT);
    $statement->bindValue(':description', $produit->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':image', $produit->getImg(), PDO::PARAM_STR);
    $statement->bindValue(':tailles', json_encode($produit->getTailles()), PDO::PARAM_STR);
    $statement->bindValue(':matieres', json_encode($produit->getMatieres()), PDO::PARAM_STR);

    $statement->execute();

}

?>