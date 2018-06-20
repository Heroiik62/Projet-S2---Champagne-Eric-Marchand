<?php

$head = require_once '../static/head.php';
$js_scripts = require_once '../static/js-scripts.php';

$html =<<<HTML
{$head}
<div id="admin-nav">
    <div class="container">   
        <div class="row">
            <div class="col-sm-12 text-left">
                <h3>Administration</h3>
            </div>
        </div>
    </div>
</div>
<div class="row" id="admin-content">
    <div class="col-md-4 col-lg-3">
        <div class="container">
            <div class="list-group text-left" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="home" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                    <i class="fas fa-home"></i> Accueil
                </a>
                <a class="list-group-item list-group-item-action" id="bottles-list" data-toggle="list" href="#list-bottles" role="tab" aria-controls="bottles">
                    <i class="fas fa-glass-martini"></i> Bouteilles
                </a>
                <a class="list-group-item list-group-item-action" id="gallery-list" data-toggle="list" href="#list-gallery" role="tab" aria-controls="gallery">
                    <i class="fas fa-images"></i> Gallerie
                </a>
                <a class="list-group-item list-group-item-action" onclick="$(location).attr('href','/');" role="tab" aria-controls="return-to-website">
                    <i class="fas fa-chevron-circle-left"></i> Retour au site
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-9">
        <div class="tab-content container" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <div class="card">
                    <h5 class="card-header bg-dark">Accueil</h5>
                    <div class="card-body">
                        <h3 class="card-title">Bienvenue sur l'espace admin</h3>
                        <p class="card-text">Sur cet espace vous allez pouvoir gérer vos produits, leurs descriptions respectives, leurs volumes disponibles ainsi que leurs prix</p>
                        <p class="card-text">Vous pourrez ajouter des images pour les produits ou la gallerie.</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-bottles" role="tabpanel" aria-labelledby="list-profile-list">
                <div class="card">
                    <h5 class="card-header bg-dark">Les bouteilles</h5>
                    <div class="card-body">
                        <h3 class="card-title">Voici la liste de vos bouteilles</h3>
                        <div class="row">
                            <div class="col-sm-6 pull-left">
                                <a href="#" class="btn btn-info" onclick="addBottle()"><i class="fas fa-plus"></i> Ajouter une bouteille</a>
                            </div>
                            <div class="col-sm-6 pull-right">
                                <a href="#" class="btn btn-info" onclick="updateBottles()"><i class="fas fa-redo"></i> Recharger les bouteilles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-gallery" role="tabpanel" aria-labelledby="list-messages-list">
                <div class="card">
                    <h5 class="card-header bg-dark">Accueil</h5>
                    <div class="card-body">
                        <h3 class="card-title">Voici la liste de vos photos de la gallerie</h3>
                        <div class="row">
                            <div class="col-sm-6 pull-left">
                                <a href="#" class="btn btn-info" onclick="addPhoto()"><i class="fas fa-plus"></i> Ajouter une photo</a>
                            </div>
                            <div class="col-sm-6 pull-right">
                                <a href="#" class="btn btn-info" onclick="updatePhotos()"><i class="fas fa-redo"></i> Recharger les photos</a>
                            </div>
                        </div>
                        <div id="list-photos" class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{$js_scripts}
<script>
    updateBottles();
    updatePhotos();

    function updatePhotos() {
    }
    
    function updateBottles() {
        console.log('photos');
    }
    
    function addPhoto() {
        console.log('photos');
    }
    
    function addBottle() {
        console.log('add bottle');
    }
    
    function removePhoto() {
        console.log('photos');
    }
    
    function removeBottle() {
        console.log('photos');
    }
</script>
HTML;

echo $html;