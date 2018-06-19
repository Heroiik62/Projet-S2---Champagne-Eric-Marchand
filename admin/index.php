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
<div class="row">
    <div class="col-md-4 col-lg-3">
        <div class="container">
            <div class="list-group text-left" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="home" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                    <i class="fas fa-home"></i> Accueil
                </a>
                <a class="list-group-item list-group-item-action" id="bottles-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                    <img src="https://images.vexels.com/media/users/3/127396/isolated/preview/e6b8636ba9d8839631c86a2d8a4efae8-champagne-bottle-flat-icon-by-vexels.png" id="champagne-bottle"/> Bouteilles
                </a>
                <a class="list-group-item list-group-item-action" id="gallery-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                    <i class="fas fa-images"></i> Gallerie
                </a>
                <a class="list-group-item list-group-item-action" id="return-to-website" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                    <i class="fas fa-chevron-circle-left"></i> Retour au site
                </a>
            </div>
        </div>
    </div>
</div>
{$js_scripts}
HTML;

echo $html;