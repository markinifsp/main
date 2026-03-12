<?php

namespace App\Controllers;

use App\Libraries\BatalhaDataStore;

class Site extends BaseController
{
    private BatalhaDataStore $store;

    public function __construct()
    {
        $this->store = new BatalhaDataStore();
    }

    public function home()
    {
        $ranking = $this->store->ranking();
        $eventos = $this->store->section('eventos');
        usort($eventos, static fn($a, $b) => strcmp($a['data'], $b['data']));

        return view('batalha/home', [
            'institucional' => $this->store->section('institucional'),
            'proximoEvento' => $eventos[0] ?? null,
            'ranking' => array_slice($ranking, 0, 5),
        ]);
    }

    public function sobre()
    {
        return view('batalha/sobre', ['institucional' => $this->store->section('institucional')]);
    }

    public function eventos()
    {
        $today = date('Y-m-d');
        $eventos = $this->store->section('eventos');
        $futuros = array_values(array_filter($eventos, static fn($e) => $e['data'] >= $today));
        $passados = array_values(array_filter($eventos, static fn($e) => $e['data'] < $today));
        usort($futuros, static fn($a, $b) => strcmp($a['data'], $b['data']));
        usort($passados, static fn($a, $b) => strcmp($b['data'], $a['data']));

        return view('batalha/eventos', compact('futuros', 'passados'));
    }

    public function mcs()
    {
        return view('batalha/mcs', ['mcs' => $this->store->ranking()]);
    }

    public function mc(string $slug)
    {
        $parts = explode('-', $slug);
        $id = (int) end($parts);
        $mc = $this->store->find('mcs', $id);
        if (! $mc) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $mc['posicao'] = 0;
        foreach ($this->store->ranking() as $item) {
            if ((int) $item['id'] === $id) {
                $mc['posicao'] = $item['posicao'];
                break;
            }
        }

        return view('batalha/mc_detalhe', ['mc' => $mc]);
    }

    public function ranking()
    {
        return view('batalha/ranking', ['ranking' => $this->store->ranking()]);
    }

    public function edicoes()
    {
        $edicoes = $this->store->section('edicoes');
        usort($edicoes, static fn($a, $b) => strcmp($b['data'], $a['data']));

        return view('batalha/edicoes', ['edicoes' => $edicoes]);
    }

    public function galeria()
    {
        return view('batalha/galeria', ['itens' => $this->store->section('galeria')]);
    }

    public function contato()
    {
        return view('batalha/contato', ['institucional' => $this->store->section('institucional')]);
    }
}
