<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $postModel = model('PostModel');
        $data['posts'] = $postModel->getPosts();
        return view('home', $data);
    }
}
