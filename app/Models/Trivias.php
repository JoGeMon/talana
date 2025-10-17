<?php

namespace App\Models;

use CodeIgniter\Model;

class Trivias extends Model
{
    protected $table      = 'trivias';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre', 'detalle', 'updated_by'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getTrivia($id){
        $trivias = $this->select('trivias.id as trivia_id, trivias.nombre')
        ->select('preguntas.id as pregunta_id, preguntas.titulo, preguntas.detalle')
        ->join('trivias_preguntas', 'trivias.id = trivias_preguntas.id_trivia')
        ->join('preguntas', 'preguntas.id = trivias_preguntas.id_pregunta')
        ->where('trivias.id', $id)
        ->findAll();
        return $trivias;
    }
}