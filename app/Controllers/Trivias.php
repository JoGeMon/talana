<?php 

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Codeigniter\Database\Exceptions\DataException;

class Trivias extends ResourceController {

    protected $format = 'json';

    /**
     * Método que lista todas las trivias creadas a modo de resumen con su nombre y su descripción
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function index(): ResponseInterface{
        try {
            $triviaModel = model('Trivias');
            $trivias = $triviaModel->findAll();
            return $this->respond($trivias);
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Método que trae una trivia con sus preguntas
     * 
     * @param int $id ID de la trivia
     * @author jvelarde
     * @return ResponseInterface
     */
    public function show($id = null): ResponseInterface{
        try {
            $triviaModel = model('Trivias');
            $trivia = $triviaModel->find($id);
            if(!$trivia){
                return $this->failNotFound('No se encontró la trivia con ID: '.$id);
            }
            $preguntasModel = model('Preguntas');
            $preguntas = $preguntasModel->where('id_trivia', $id)->findAll();
            $trivia_completa = [
                'id'        => $trivia['id'],
                'nombre'    => $trivia['nombre'],
                'preguntas' => $preguntas,
            ];
            return $this->respond($trivia_completa);
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Método que crea una nueva trivia
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function create(): ResponseInterface{
        try {
            $triviaModel = model("Trivias");
            $data = $this->request->getJson();
            if(empty($data)){
                return $this->failValidationErrors('No se enviaron datos para crear la trivia');
            }
            $data->updated_by = 1; // TODO: Cambiar cuando se implemente login
            if($triviaModel->insert($data)){
                return $this->respondCreated($data,'Trivia creada correctamente');
            }
            return $this->failValidationErrors($triviaModel->errors());
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}