<?php

namespace App\Models;

use CodeIgniter\Model;

class Trivias extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    //protected $allowedFields = ['username', 'email', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash', 'status', 'status_message', 'active', 'force_pass_reset', 'permissions'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getTrivia($trivia_id){
        $trivias = $this->db->table('trivias');
        $trivias->select('preguntas.*')
        ->join('trivias_preguntas', 'trivias.id = trivias_preguntas.id_trivia')
        ->join('preguntas', 'preguntas.id = trivias_preguntas.id_pregunta')
        ->where('trivias.id', $trivia_id)
        ->where('trivias.deleted', 0)
        ->where('preguntas.deleted', 0)
        ->get();;
        print_r($this->db->getLastQuery()->getQuery());
        print_r($trivias);
        return $this->findAll();
    }
}