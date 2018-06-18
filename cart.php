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
    {$head}
    {$navbar}

        <main role="main" class="inner cover">
            <div class="jumbotron jumbotron-fluid ">
                <div class="container">
                    <h1 class="display-4">Votre panier</h1>
                </div>
                <div class="container">
                    <div class="row" id="cart-review">
                        <div class="col-sm-12 alert alert-primary text-center">
                            <h3>Chargement de votre panier en cours <i class="fas fa-spinner fa-spin"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        {$footer}
        {$js_scripts}
        
        <script type="text/javascript">
            let countArticles = 0;
            let price = 0;
            let articles = "";
        
            if (localStorage.getItem('shopping-cart') === null || localStorage.getItem('shopping-cart') === undefined) {
                localStorage.setItem('shopping-cart', JSON.stringify([]));
            }
            else {
                JSON.parse(localStorage.getItem('shopping-cart')).map((article) => {
                    articles += "<div class='col-sm-12' id='"+article.id+"'><div class='row'><h2 class='col-sm-6 offset-sm-3 offset-lg-2 col-lg-8'>"+article.name+"</h2><button class='btn btn-danger col-sm-3 col-lg-2' onclick='removeItems($(this))'><h3>Supprimer</h1></button></div><div class='dropdown-divider'></div>"
                    article.volumes.map((volume) => {
                        countArticles += parseInt(volume.quantity);
                        price += volume.price*volume.quantity;
                        articles += "<div class='row'><div class='col-sm-10'><span id='bottleQuantity'>"+volume.quantity+"</span> bouteille(s) de <span id='bottleVolume'>"+volume.name+"</span> : (<span id='bottlePrice'>"+volume.price+"</span>€ l'unité) </div>" +
                        "<div class='col-sm-2'><button class='btn btn-info' onclick='addOneItem($(this))'>" +
                          "<i class='fas fa-caret-up'></i> 1" +
                        "</button>" +
                        "<button class='btn btn-danger' onclick='removeOneItem($(this))'>" +
                         "<i class='fas fa-caret-down'></i> 1" +
                        "</button></div></div>"
                    });
                    articles += "</div>";
                });
                
                articles += "<div class='col-sm-12'><h2>Résumé</h2><div class='dropdown-divider'></div><h3>Vous avez <span id='numberBottles'>"+countArticles+"</span> bouteille(s) dans votre panier pour un total de <span id='priceBottles'>"+price+"</span> euros</h3></div>"
            }
            $('#shopping-cart').text(countArticles);
            $('#cart-review').html(articles);
        </script>
        <script>
            function removeOneItem(item) {
                var myjsoncart = JSON.parse(localStorage.getItem('shopping-cart'));
                let quantityItem = item.parent().parent().find('#bottleQuantity');
                console.log("My first : ", myjsoncart);
                if (quantityItem.text() <= 1) {
                    if (item.parent().parent().parent().children().length > 3){
                        item.parent().parent().fadeOut(400, () => {
                            myjsoncart.forEach((myobject, myindex) => {
                                if (item.parent().parent().parent().attr('id') === myobject.id) {
                                    myobject.volumes.forEach((volume, index) => {
                                        if (volume.name === item.parent().parent().find('#bottleVolume').text()) {
                                            myjsoncart[myindex].volumes.splice(index, 1);
                                            localStorage.setItem('shopping-cart', JSON.stringify(myjsoncart));
                                        }
                                    })
                                }
                            });
                            item.parent().parent().remove();
                        });
                    } else {
                        removeItems(item.parent())
                        myjsoncart = JSON.parse(localStorage.getItem('shopping-cart'));
                    }
                    
                    
                } else {
                    let priceItem = item.parent().parent().find('#bottlePrice').text();
                    quantityItem.text(quantityItem.text() - 1);
                    myjsoncart.forEach((myobject) => {
                        if (item.parent().parent().parent().attr('id') === myobject.id) {
                            myobject.volumes.forEach((volume, index) => {
                                if (volume.name === item.parent().parent().find('#bottleVolume').text()) {
                                    volume.quantity = quantityItem.text();
                                }
                            })
                        }
                    });
                }
                localStorage.setItem('shopping-cart', JSON.stringify(myjsoncart));
                countBottles();
            }
            
            function addOneItem(item) {
              
            }
            
            function removeItems(item) {
              $(item).parent().parent().fadeOut(400, () => {
                item.parent().parent().remove();
              });
              let myjsoncart = JSON.parse(localStorage.getItem('shopping-cart'));
              myjsoncart.forEach((myobject, index) => {
                  if (item.parent().parent().attr('id') === myobject.id) {
                      myjsoncart.splice(index, 1);
                  }
                });
              localStorage.setItem('shopping-cart', JSON.stringify(myjsoncart));
              countBottles();
            }
            
            function countBottles() {
              let articles = {quantity: 0, price: 0};
              let myjsoncart = JSON.parse(localStorage.getItem('shopping-cart'));
              myjsoncart.map((article) => {
                  article.volumes.map((volume) => {
                      articles.quantity = parseInt(articles.quantity) + parseInt(volume.quantity);
                      articles.price = articles.price + parseFloat(volume.price)*parseInt(volume.quantity);
                  })
              })
              $('#shopping-cart').text(articles.quantity);
              $('#numberBottles').text(articles.quantity);
              $('#priceBottles').text(articles.price);
            }
        </script>
    </body>
</html>
HTML;
echo $html;