<?php

return <<<HTML
            <header class="masthead mb-auto">
                <div class="inner">
                    <img class='masthead-brand' src='img/logo.png' alt='logo Champagne Eric Marchand' width='500px'>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse col-md-12" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto col-md-12">
                                <li class="nav-item active text-center col-md-2">
                                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="produit.php">Produits</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Histoire</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="galerie.php">Galerie</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-light" id="shopping-cart"></span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
HTML;
