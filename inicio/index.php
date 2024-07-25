<?php

require_once '../config.php';
require_once '../controladores/PokemonControlador.php';

$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$url = explode('/', $url);

$controladorNombre = isset($url[0]) && !empty($url[0]) ? ucwords($url[0]) . 'Controlador' : 'PokemonControlador';
$metodoNombre = isset($url[1]) && !empty($url[1]) ? $url[1] : 'lista';
$params = array_slice($url, 2);

$controlador = new $controladorNombre;
call_user_func_array([$controlador, $metodoNombre], $params);
?>
