<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        $data['msg'] = '';
        if($this->request->is('post')) {
            $usuarioModel = model('UsuarioModel');
            $usuarioData = $this->request->getPost();
            //verifica as credenciais do usuário
            $checkUsuario = $usuarioModel->check(
                $usuarioData['usuario'], $usuarioData['senha']
            );

            if(! $checkUsuario) {
                $data['msg'] = "Usuário e/ou senha incorretos";
            }
            else {
                //salvar as informacoes do usuario na sessao
                $this->session->set('id', $checkUsuario->id);
                $this->session->set('nome', $checkUsuario->nome);
                $this->session->set('perfil', $checkUsuario->perfil);
                return redirect()->to('admin/posts');
            }
        }
        return view('login', $data);
    }
}
