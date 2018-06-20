<?php

require_once '../gallery.class.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        return Gallery::getAll();
    case "POST":
        return Gallery::addPhoto($_POST['url']);
    case "PUT":
        return Gallery::getAll($_POST);
    case "DELETE":
        return Gallery::removePhoto($_POST['id']);
}