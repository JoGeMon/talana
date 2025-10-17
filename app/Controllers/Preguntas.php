<?php 

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Codeigniter\Database\Exceptions\DataException;

class Preguntas extends ResourceController {

    protected $format = 'json';

    /**
     * Método que lista todas las preguntas creadas
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function index(): ResponseInterface{
        try {
            $preguntasModel = model('Preguntas');
            $preguntas = $preguntasModel->findAll();
            if(!$preguntas){
                return $this->failNotFound('No se encontraron preguntas');
            }
            return $this->respond($preguntas);
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Método que crea una nueva pregunta
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function create(): ResponseInterface {
        try {
            $preguntasModel = model('Preguntas');
            $data = $this->request->getJSON();
            if(empty($data)){
                return $this->failValidationErrors('No se enviaron datos para crear la pregunta');
            }
            $data->updated_by = 1; // TODO: Cambiar cuando se implemente login

            $trivia = model('Trivias')->find($data->id_trivia);
            if(!$trivia){
                return $this->failValidationErrors('No se encontró la trivia con id: '.$data->id_trivia);
            }

            if($preguntasModel->insert($data)){
                return $this->respondCreated($data,'Pregunta creada correctamente');
            }
            return $this->failValidationErrors($preguntasModel->errors());
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Método que lista una pregunta en particular con sus posibles respuestas
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function show($id = null): ResponseInterface {
        $preguntasModel = model('Preguntas');
        $pregunta = $preguntasModel->where([
            'id' => $id,
        ])->first();
        if(!$pregunta){
            return $this->failNotFound('No se encontró la pregunta con id: '.$id);
        }
        return $this->respond($pregunta);
    }

    /**
     * Método que lista las preguntas de una trivia en particular
     * TODO: Implementar después de trivia
     */
    public function showByTrivia(int $trivia_id){
        return $this->respond([]);
    }
}