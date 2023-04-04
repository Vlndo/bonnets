<!DOCTYPE html>

<?php
    $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.';
    $produits = [
        [
            'nom_produit'   =>  'Bonnet en laine', 
            'prix_produit'  =>  10,
            'description_produit'   =>  $description
        ],
        [
            'nom_produit'   =>  'Bonnet en laine bio', 
            'prix_produit'  =>  14,
            'description_produit'   =>  $description
        ],
        [
            'nom_produit'   =>  'Bonnet en laine et cachemire', 
            'prix_produit'  =>  20,
            'description_produit'   =>  $description
        ],
        [
            'nom_produit'   =>  'Bonnet arc-en-ciel', 
            'prix_produit'  =>  12,
            'description_produit'   =>  $description
        ],
    ];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Produits</th>
            <th>Prix</th>
            <th>Descripion</th>
        </tr>
            <?php
                foreach ($produits as $index => $produit) {
            ?>
                    <tr>
                        <td>
            <?php
                            echo $produit['nom_produit'];
            ?>
                        </td>
                        <td 
                            <?php 
                                if ($produit['prix_produit'] <= 12) {
                                    echo "class = 'green'";
                                }else{
                                    echo "class = 'red'";
                                };
                            ?>
                        >
            <?php
                            echo $produit['prix_produit'] . " €";
            ?>
                        </td>
                        <td>
            <?php
                            echo $produit['description_produit'];
            ?>
                        </td>
                    </tr>
            <?php
                };
            ?>
    </table>
</body>
</html>