<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre', 'email', 'alias', 'updated_by'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted';

    protected $validationRules    = [
        'nombre' => 'required|min_length[3]|max_length[100]',
        'email'  => 'required|valid_email|is_unique[usuarios.email,id,{id}]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}