<?php

require "vendor/autoload.php";

use SlownLS\GmodStore\Client;

$gmodstore = new Client("gmodstore_apikey");

$collection = $gmodstore->GetCollection("Addons");
$addons = $collection->GetAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SlownLS - GmodStore API</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style> .bg-primary { background-color: #3097d1!important; color: white, } .bg-primary .navbar-brand { color: white; } .bg-primary .nav-link { color: hsla(0,0%,100%,.5); } .bg-primary .nav-link:hover { color: white; } a{ transition: color .2s linear; color: rgba(0, 0, 0, .7); } a:hover{ color: black; } </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">GmodStore API</a>
    
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h4 class="text-center mt-4">List of my addons :</h4>
        
        <hr>

        <div class="row">
            <?php foreach($addons->data as $key => $value): ?>
                <?php 
                    if( !$value->active ) continue; 
                    
                    $name = $value->name;
                    $image = $value->images->listing;
                    $currency = $value->price->original->currency;
                    $price = $value->price->original->amount;
                    $price = substr($price, 0, 1) . "," . substr($price, 1, 2);

                    if( strlen($name) > 29 ) { $name = substr($name, 0, 29) . "..."; }
                ?>

                <div class="col-md-4 mb-3">
                    <a href="<?= $value->route ?>" target="_blank">                 
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $image?>" alt="" style="width: 100%; height: 125px;">
                            </div>
                            <div class="card-body">
                                <p class="float-left mb-0"><?= $name ?></p> 
                                <p class="float-right mb-0"><?= $price ?> <?= $currency ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>