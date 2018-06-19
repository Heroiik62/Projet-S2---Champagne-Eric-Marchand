<?php
require 'myPDO.include.php';
require 'volume.class.php';
require 'produit.class.php';
require 'gamme.class.php';
$head = require_once 'static/head.php';
$navbar = require_once 'static/navbar.php';
$footer = require_once 'static/footer.php';
$js_scripts = require_once 'static/js-scripts.php';

$html = <<<HTML
<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Champagne Éric Marchand</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' integrity='sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB' crossorigin='anonymous'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' integrity='sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp' crossorigin='anonymous'>
    </head>

    <body class='text-center'>

        <div class="modal fade" id="avertissement" tabindex="-1" role="dialog" aria-labelledby="ageAvertissment" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content row col-md-12">
                    <div class="modal-header offset-md-2">
                        <img class="modal-title" src='img/logo.png' alt='logo Champagne Eric Marchand' width='500px'>
                    </div>
                    <div class="modal-body offset-md-4 col-md-4 offset-sm-4 col-sm-4">
                        <form>
                           <p>Entrez votre age :</p>
                            <input type="text" id="age" maxlength="2" class="form-control offset-md-5 col-md-2" pattern="[0-9]{2}" style="text-align:center;" required>
                            <small id="ageUnder" class="form-text text-muted"></small>
                            <button id="enterAge" type="button" onclick="verify()" class="btn btn-primary">Entrer</button>
                        </form>
                    </div>
                        <div class="modal-footer">
                        <p>L'abus d'alcool est dangereux pour la santé, à consommer avec modération.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class='cover-container d-flex w-100 h-100 mx-auto flex-column'>
            {$head}
            {$navbar}

            <main role='main' class='inner cover'>
                <div id='sliderAccueil' class='carousel slide' data-ride='carousel'>
                    <ol class='carousel-indicators'>
                        <li data-target='#sliderAccueil' data-slide-to='0' class='active'></li>
                        <li data-target='#sliderAccueil' data-slide-to='1'></li>
                        <li data-target='#sliderAccueil' data-slide-to='2'></li>
                    </ol>
                    <div class='carousel-inner'>
                        <div class='carousel-item active'>
                            <img class='d-block w-100' src='img/grappe.jpg' alt='First slide'>
                        </div>
                        <div class='carousel-item'>
                            <img class='d-block w-100' src='http://archeochampagne.epernay.fr/wp-content/uploads/8_caves-de-lavenue-de-champagne_michel-jolyot-1923x580.jpg' alt='Second slide'>
                        </div>
                        <div class='carousel-item'>
                            <img class='d-block w-100' src='img/slidergrappe.png' alt='Third slide'>
                        </div>
                    </div>
                    <a class='carousel-control-prev' href='#sliderAccueil' role='button' data-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Précédent</span>
                    </a>
                    <a class='carousel-control-next' href='#sliderAccueil' role='button' data-slide='next'>
                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Suivant</span>
                    </a>
                </div>

                <div class='jumbotron jumbotron-fluid '>
                    <div class='container col-md-12'>
                        <h1 class='display-4'>Nos vins et cépages :</h1>
                        <p class='lead'>This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>

                        <div id='sliderChampagne' class='carousel slide offset-md-5 col-md-2' data-ride='carousel'>
                            <div class='carousel-inner'>
                                <div class='carousel-item active'>
                                    <img height='250px' class='' src='img/brut.png' alt='First slide'>
                                    <div class='carousel-caption d-md-block'>
                                        <a href="produit.php"><button type='button' class='btn btn-dark'><u>Produits</u></button></a>
                                    </div>
                                </div>
HTML;
$products = (Produit::getProduits());

foreach ($products as $product) {
$html .= <<<HTML
                                <div class='carousel-item'>
                                    <img src="imageProduct.php?bouteille={$product->getNom()}" class="img-thumbnail transparent-image" alt="Produit n°{$product->getId()}"/>
                                    <div class='carousel-caption d-md-block'>
                                        <a href="produit.php"><button type='button' class='btn btn-dark'>{$product->getNom()}</button></a>
                                    </div>
                                </div>
HTML;
}
$html .= <<<HTML
                            </div>
                            <a class='carousel-control-prev' href='#sliderChampagne' role='button' data-slide='prev'>
                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Précédent</span>
                            </a>
                            <a class='carousel-control-next' href='#sliderChampagne' role='button' data-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Suivant</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class='jumbotron jumbotron-fluid row'>
                    <div class='container'>
                        <h1 class='display-4'>L'histoire du Champagne Éric Marchand :</h1>
                        <p class='lead'>This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    </div>
                </div>

            </main>

            {$footer}
            {$js_scripts}
        
            <script type="text/javascript">
                let countArticles = 0;
            
                if (localStorage.getItem('shopping-cart') === null || localStorage.getItem('shopping-cart') === undefined) {
                    localStorage.setItem('shopping-cart', JSON.stringify([]));
                }
                else {
                    JSON.parse(localStorage.getItem('shopping-cart')).map((article) => {
                        article.volumes.map((volume) => {
                            countArticles += volume.quantity;
                        });
                    })
                }
                $('#shopping-cart').text(countArticles);
            </script>
    </body>
</html>
HTML;
echo $html;