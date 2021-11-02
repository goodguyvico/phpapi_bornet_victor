<?php

$response = file_get_contents('https://api.thecatapi.com/v1/breeds?limit=100&page=0');
$cats = json_decode($response);

var_dump($cats);
include 'views/catListView.php';