<?php
require 'myPDO.include.php';
require 'volume.class.php';
require 'produit.class.php';
require 'gamme.class.php';
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
            <header class='masthead mb-auto'>
                <div class='inner'>
                    <img class='masthead-brand' src='img/logo.png' alt='logo Champagne Eric Marchand' width='500px'>
                    <nav class='navbar navbar-expand-lg navbar-dark bg-dark row'>
                        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                            <span class='navbar-toggler-icon'></span>
                        </button>

                        <div class='collapse navbar-collapse col-md-12' id='navbarSupportedContent'>
                            <ul class='navbar-nav mr-auto col-md-12'>
                                <li class='nav-item active text-center col-md-2'>
                                    <a class='nav-link' href='index.php'><i class='fas fa-home'></i></a>
                                </li>
                                <li class='nav-item text-center col-md-2'>
                                    <a class='nav-link' href='produit.php'>Produits</a>
                                </li>
                                <li class='nav-item text-center col-md-2'>
                                    <a class='nav-link' href='#'>Histoire</a>
                                </li>
                                <li class='nav-item text-center col-md-2'>
                                    <a class='nav-link' href='contact.php'>Contact</a>
                                </li>
                                <li class='nav-item text-center col-md-2'>
                                    <a class='nav-link' href='galerie.php'>Galerie</a>
                                </li>
                                <li class='nav-item text-center col-md-2'>
                                    <a class='nav-link' href='#'><i class='fas fa-user'></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

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

            <footer class='mastfoot s h-100 row'>
                <div class='inner container'>
                    <p id='socialnet'><a class='text-center col-md-4' href='https://www.facebook.com/Champagne-Eric-Marchand-653088821528194/' target='_blank'><i class='fab fa-facebook-square fa-1x'></i></a><i class='fab fa-1x fa-instagram'></i><i class='fab fa-1x fa-twitter'></i><i class='fab fa-1x fa-google-plus-g'></i></p>
                    <p class='text-center offset-md-4 col-md-4'>Copyright 2018 Champagne Éric Marchand</p>
                    <p class='text-center offset-md-4 col-md-4'>Tous droits réservés • Mentions Légales</p>
                </div>
            </footer>
        </div>

        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' integrity='sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T' crossorigin='anonymous'></script>
        <script src='js/js.js'></script>
    </body>
</html>
HTML;
echo $html;