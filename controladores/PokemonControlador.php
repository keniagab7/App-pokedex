<?php
require_once '../modelos/Pokemon.php';

class PokemonControlador {
    public function lista() {
        $pokemonModelo = new Pokemon();
        $datos = $pokemonModelo->obtenerListaPokemon();
        require_once '../vistas/lista.php';
    }
    
    public function detalle($nombre) {
        $pokemonModelo = new Pokemon();
        $datos = $pokemonModelo->obtenerDetallePokemon($nombre);
        require_once '../vistas/detalle.php';
    }
    
    public function buscar() {
        $query = $_GET['query'];
        $query = strtolower(trim($query));

        $pokemonModelo = new Pokemon();
        $datos = $pokemonModelo->buscarPokemon($query);

        require_once '../vistas/lista.php';
    }
}