<?php

if (isset($_GET['bouteille']) && !is_null($_GET['bouteille'])) {
    $name = str_replace(' ', '-', strtolower($_GET['bouteille']));
    if (file_exists('img/'.$name.'.png')) {
        header('Content-Type: image/png');
        readfile('img/'.$name.'.png');
    } else {
        echo 'qklndqzlknds';
    }
}