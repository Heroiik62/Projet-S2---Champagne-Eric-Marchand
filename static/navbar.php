<?php

$name = explode('/',  $_SERVER['PHP_SELF'])[1];
$actives = ['', '', '', '', '', ''];

switch ($name) {
    case '/produit.php':
        $actives[1] = 'active';
        break;
    case '/histoire.php':
        $actives[2] = 'active';
        break;
    case '/contact.php':
        $actives[3] = 'active';
        break;
    case '/galerie.php':
        $actives[4] = 'active';
        break;
    case '/cart.php':
        $actives[4] = 'active';
        break;
    default:
        $actives[0] = 'active';
        break;
}

return <<<HTML
            <header class="masthead mb-auto">
                <div class="inner">
                    <img class='masthead-brand' src='img/logo.png' alt='logo Champagne Eric Marchand' width='30%'>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse col-md-12" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto col-md-12">
                              <li class="nav-item {$actives[0]} text-center col-md-2">
                                  <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
                              </li>
                              <li class="nav-item {$actives[1]} text-center col-md-2">
                                  <a class="nav-link" href="produit.php">Produits</a>
                              </li>
                              <li class="nav-item {$actives[2]} text-center col-md-2">
                                  <a class="nav-link" href="histoire.php">Histoire</a>
                              </li>
                              <li class="nav-item {$actives[3]} text-center col-md-2">
                                  <a class="nav-link" href="contact.php">Contact</a>
                              </li>
                              <li class="nav-item {$actives[4]} text-center col-md-2">
                                  <a class="nav-link" href="galerie.php">Galerie</a>
                              </li>
                              <li class="nav-item {$actives[5]} text-center col-md-2">
                                  <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-light" id="shopping-cart"></span></a>
                              </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
HTML;
