<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Posts extends BaseController
{
    public function index($id)
    {
        $postModel = model('PostModel');
        $data['post'] = $postModel->getPostById($id);
        return view('post', $data);
    }

    public function editar($id): ResponseInterface
    {
        $data['msg'] = '';
        if ($this->request->is('post')) {
            $postModel = model('PostModel');
            $postData = $this->request->getPost();
            $postModel->update($id, $postData);
            return redirect()->to('admin/posts');
        }
        else {
            $postModel = model('PostModel');
            $data['post'] = $postModel->getPostById($id);
            $categoriaModel = model('CategoriaModel');
            $data['categorias'] = $categoriaModel->getCategoriasToDropDown();
            return view('admin/editar_post', $data);
        }

    }
}
