<?php

class Pokemon {
    private $apiBaseUrl = 'https://pokeapi.co/api/v2/';

    public function obtenerListaPokemon() {
        $apiUrl = $this->apiBaseUrl . 'pokemon?limit=151';
        $response = file_get_contents($apiUrl);
        return json_decode($response, true);
    }

    public function obtenerDetallePokemon($nombre) {
        $apiUrl = $this->apiBaseUrl . 'pokemon/' . $nombre;
        $response = file_get_contents($apiUrl);
        $pokemon = json_decode($response, true);

        $speciesUrl = $pokemon['species']['url'];
        $speciesResponse = file_get_contents($speciesUrl);
        $speciesData = json_decode($speciesResponse, true);

        foreach ($speciesData['flavor_text_entries'] as $entry) {
            if ($entry['language']['name'] == 'en') {
                $pokemon['description'] = $entry['flavor_text'];
                break;
            }
        }

        $pokemon['moves_list'] = [];
        foreach ($pokemon['moves'] as $move) {
            $moveName = $move['move']['name'];
            $pokemon['moves_list'][] = ucfirst(str_replace('-', ' ', $moveName));
        }

        return $pokemon;
    }

    public function buscarPokemon($query) {
        $apiUrl = $this->apiBaseUrl . 'pokemon/' . $query;
        $response = file_get_contents($apiUrl);
        if ($response === FALSE) {
            return ['results' => []];
        } else {
            $pokemon = json_decode($response, true);
            if (!isset($pokemon['id'])) {
                $pokemon['url'] = $this->apiBaseUrl . 'pokemon/' . $pokemon['name'] . '/';
            }
            return ['results' => [$pokemon]];
        }
    }
}
