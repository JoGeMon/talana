<?php 

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Codeigniter\Database\Exceptions\DataException;

class Trivias extends ResourceController {

    protected $format = 'json';

    /**
     * Método que lista todas las trivias disponibles
     * 
     * @author jvelarde
     * @return ResponseInterface
     */
    public function index(): ResponseInterface{
        try {
            $triviaModel = model('Trivias');
            $trivias = $triviaModel->getTrivias();
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
     * @author jvelarde
     * @return ResponseInterface
     */
    public function show(int $trivia_id): ResponseInterface{
        try {
            $triviaModel = model('Trivias');
            $trivias = $triviaModel->getTrivia($trivia_id);
            return $this->respond($trivias);
        } catch (DataException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}