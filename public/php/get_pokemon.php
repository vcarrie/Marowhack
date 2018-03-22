<?php
use PokePHP\PokeApi;
include '../../vendor/danrovito/pokephp/src/PokeApi.php';
$api = new PokeApi;

$id = 15;

var_dump($api->pokemonForm($id));
