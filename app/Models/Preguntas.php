<?php

namespace App\Models;

use CodeIgniter\Model;

class Preguntas extends Model
{
    protected $table      = 'preguntas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['titulo', 'detalle', 'dificultad', 'puntaje', 'updated_by', 'id_trivia'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted';

    protected $validationRules    = [
        'titulo'     => 'required|string|max_length[255]',
        'detalle'    => 'permit_empty|string',
        'id_trivia'  => 'required|integer|greater_than[0]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}