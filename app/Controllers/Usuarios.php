<?php 

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Codeigniter\Database\Exceptions\DataException;

class Usuarios extends ResourceController {

    protected $format = 'json';

    /**
     * Método que lista todo los usuarios creados que estén disponibles en la base de datos
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function index(): ResponseInterface{
        try {
            $userModel = model('Usuarios');
            $usuarios = $userModel->findAll();
            return $this->respond($usuarios);
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Método que crea un nuevo usuario en la base de datos
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function create(): ResponseInterface {
        try {
            $userModel = model('Usuarios');
            $data = $this->request->getJSON();
            if($userModel->insert($data)){
                return $this->respondCreated($data,'Usuario creado correctamente');
            }
            return $this->failValidationErrors($userModel->errors());
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}