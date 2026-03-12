<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        $error = '';
        if ($this->request->is('post')) {
            $usuario = $this->request->getPost('usuario');
            $senha = $this->request->getPost('senha');

            if ($usuario === 'admin' && $senha === 'batalhadoceu123') {
                $this->session->set('admin_logged', true);
                return redirect()->to('/admin');
            }
            $error = 'Credenciais inválidas.';
        }

        return view('admin_batalha/login', ['error' => $error]);
    }

    public function logout()
    {
        $this->session->remove('admin_logged');
        return redirect()->to('/admin/login');
    }
}
