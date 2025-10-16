<?php 

namespace App\Controllers;

class Usuarios extends BaseController
{
    public function index(): string
    {
        $userModel = model('Usuarios');
        $usuarios = $userModel->findAll();
        $data = ['usuarios' => $usuarios];
        return view('usuarios', $data);
    }
}