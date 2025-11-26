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
}
