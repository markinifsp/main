<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Registrar extends BaseController
{
    public function index()
    {
        $data['msg'] = '';
        if($this->request->is('post')) {
            $usuarioModel = model('UsuarioModel');
            try{
                $usuarioData = $this->request->getPost();
                $usuarioData['perfil'] = 'usuario';
                if($usuarioModel->insert($usuarioData)) {
                    $data['msg'] = "Usuário criado com sucesso";
                }
                else {
                    $data['msg'] = "Erro ao criar usuário";
                    $data['errors'] = $usuarioModel->errors();
                }
            }
            catch(\Exception $e) {
                $data['msg'] = "Erro ao criar usuário: " . $e->getMessage();
            }
        }
        return view('registrar', $data);
    }
}
