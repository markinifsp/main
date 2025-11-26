<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Categorias extends BaseController
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = model('CategoriaModel');
    }

    public function index()
    {
        $data['categorias'] = $this->categoriaModel->findAll();
        $data['active'] = 'categorias';
        return view('admin/categorias', $data);
    }

    public function adicionar()
    {
        $data['msg'] = '';
        if($this->request->is('post')) {
            $categoria = $this->request->getPost();
            if($this->categoriaModel->insert($categoria)) {
                $data['msg'] = 'Categoria cadastrada com sucesso';
                $data['msg_icon'] = 'primary';
            }
            else {
                $data['msg'] = "Erro ao cadastrar categoria";
                $data['msg_icon'] = 'danger';
                $data['erros'] = $this->categoriaModel->errors();
            }
        }

        $data['active'] = 'categorias';
        return view('admin/categorias_form', $data);
    }
}
