<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['titulo', 'resumo', 'conteudo', 'usuario_id', 'categoria_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'titulo' => 'required',
        'resumo' => 'required',
        'conteudo' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    //busca os posts, fazendo JOIN com categoria e usuario
    public function getPosts() 
    {
        return $this->select('posts.id, titulo, resumo, conteudo, nome, descricao, cor')
                    ->join('categorias c', 'posts.categoria_id = c.id')
                    ->join('usuarios u', 'posts.usuario_id = u.id')
                    ->orderBy('posts.id DESC')
                    ->findAll();
    }

    public function getPostById($id) 
    {
        return $this->select('posts.id, titulo, resumo, conteudo, nome, descricao, cor')
                    ->join('categorias c', 'posts.categoria_id = c.id')
                    ->join('usuarios u', 'posts.usuario_id = u.id')
                    ->where('posts.id', $id)
                    ->orderBy('posts.id DESC')
                    ->first();
    }
}
