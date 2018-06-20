<?php

require_once '../produit.class.php';

header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        echo json_encode(Produit::getAll());
}