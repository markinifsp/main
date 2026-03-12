<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\BatalhaDataStore;

class Painel extends BaseController
{
    private BatalhaDataStore $store;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->store = new BatalhaDataStore();
    }

    public function index()
    {
        $data = [
            'totalMcs' => count($this->store->section('mcs')),
            'proximosEventos' => count(array_filter($this->store->section('eventos'), static fn($e) => $e['data'] >= date('Y-m-d'))),
            'ultimasEdicoes' => array_slice($this->store->section('edicoes'), -3),
            'fotos' => count($this->store->section('galeria')),
        ];

        return view('admin_batalha/dashboard', $data);
    }

    public function mcs()
    {
        return view('admin_batalha/mcs', ['mcs' => $this->store->ranking()]);
    }

    public function salvarMc()
    {
        $payload = $this->request->getPost([
            'id', 'nome_artistico', 'cidade', 'bio', 'pontuacao', 'participacoes', 'vitorias', 'titulos', 'foto',
        ]);

        if ($file = $this->request->getFile('foto_upload')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $newName);
                $payload['foto'] = '/uploads/' . $newName;
            }
        }

        $this->store->upsert('mcs', $payload);
        return redirect()->to('/admin/mcs');
    }

    public function excluirMc(int $id)
    {
        $this->store->remove('mcs', $id);
        return redirect()->to('/admin/mcs');
    }

    public function eventos()
    {
        return view('admin_batalha/eventos', ['eventos' => $this->store->section('eventos')]);
    }

    public function salvarEvento()
    {
        $payload = $this->request->getPost(['id', 'titulo', 'data', 'horario', 'local', 'descricao', 'imagem']);
        if ($file = $this->request->getFile('imagem_upload')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $name = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $name);
                $payload['imagem'] = '/uploads/' . $name;
            }
        }
        $this->store->upsert('eventos', $payload);
        return redirect()->to('/admin/eventos');
    }

    public function excluirEvento(int $id)
    {
        $this->store->remove('eventos', $id);
        return redirect()->to('/admin/eventos');
    }

    public function edicoes()
    {
        return view('admin_batalha/edicoes', ['edicoes' => $this->store->section('edicoes')]);
    }

    public function salvarEdicao()
    {
        $payload = $this->request->getPost(['id', 'nome', 'data', 'campeao', 'participantes', 'observacoes', 'fotos']);
        $this->store->upsert('edicoes', $payload);
        return redirect()->to('/admin/edicoes');
    }

    public function excluirEdicao(int $id)
    {
        $this->store->remove('edicoes', $id);
        return redirect()->to('/admin/edicoes');
    }

    public function galeria()
    {
        return view('admin_batalha/galeria', ['itens' => $this->store->section('galeria')]);
    }

    public function salvarFoto()
    {
        $payload = $this->request->getPost(['id', 'imagem', 'legenda', 'referencia']);
        if ($file = $this->request->getFile('imagem_upload')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $name = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $name);
                $payload['imagem'] = '/uploads/' . $name;
            }
        }

        $this->store->upsert('galeria', $payload);
        return redirect()->to('/admin/galeria');
    }

    public function excluirFoto(int $id)
    {
        $this->store->remove('galeria', $id);
        return redirect()->to('/admin/galeria');
    }

    public function institucional()
    {
        return view('admin_batalha/institucional', ['inst' => $this->store->section('institucional')]);
    }

    public function salvarInstitucional()
    {
        $data = $this->store->all();
        $data['institucional'] = $this->request->getPost(['sobre', 'endereco', 'instagram', 'youtube', 'banner']);
        $this->store->save($data);
        return redirect()->to('/admin/institucional');
    }
}
