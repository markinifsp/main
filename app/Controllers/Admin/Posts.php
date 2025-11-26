<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Posts extends BaseController
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = model('PostModel');
    }

    public function index()
    {
        $data['posts'] = $this->postModel->getPosts();
        $data['active'] = 'posts';
        return view('admin/posts', $data);
    }

    public function adicionar()
    {
        $data['msg'] = '';
        if($this->request->is('post')) {
            $post = $this->request->getPost();
            $post['usuario_id'] = $this->session->get('id');
            if($this->postModel->insert($post)) {
                $data['msg'] = 'Post cadastrado com sucesso';
                $data['msg_icon'] = 'primary';
            }
            else {
                $data['msg'] = "Erro ao cadastrar post";
                $data['msg_icon'] = 'danger';
                $data['erros'] = $this->postModel->errors();
            }
        }

        //carregar as categorias
        $categoriaModel = model('CategoriaModel');
        $listaCategorias = $categoriaModel->getCategoriasToDropDown();
        helper('form');
        $data['comboCategorias'] = form_dropdown('categoria_id', $listaCategorias, [], 'class="form-select rounded-3"');

        $data['active'] = 'posts/adicionar';
        return view('admin/posts_form', $data);
    }
}
