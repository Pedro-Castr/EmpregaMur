<?php

namespace App\Model;

use Core\Library\ModelMain;

class PostagemModel extends ModelMain
{
    protected $table = "postagem";
    protected $primaryKey = "postagem_id";

    public $validationRules = [
        "comentario"  => [
            "label" => 'Comentário',
            "rules" => 'required|min:3'
        ]
    ];

    public function getUsuarioId($postagemId)
    {
        return $this->db->where('postagem_id', $postagemId)->first();
    }

    public function getPostagens()
    {
        return $this->db
            ->select('postagem.postagem_id, postagem.usuario_id, postagem.comentario, postagem.imagem, postagem.data_criacao,
                usuario.foto_perfil, usuario.nome, usuario.estabelecimento_id, usuario.pessoa_fisica_id, curriculum.curriculum_id')
            ->join('usuario', 'postagem.usuario_id = usuario.usuario_id', 'LEFT')
            ->join('curriculum', 'usuario.pessoa_fisica_id = curriculum.pessoa_fisica_id', 'LEFT')
            ->findAll();
    }

    public function getPostagensById($usuarioId)
    {
        return $this->db
            ->select('postagem.postagem_id, postagem.usuario_id, postagem.comentario, postagem.imagem, postagem.data_criacao,
                usuario.foto_perfil, usuario.nome, usuario.estabelecimento_id, usuario.pessoa_fisica_id, curriculum.curriculum_id')
            ->join('usuario', 'postagem.usuario_id = usuario.usuario_id', 'LEFT')
            ->join('curriculum', 'usuario.pessoa_fisica_id = curriculum.pessoa_fisica_id', 'LEFT')
            ->where('usuario.usuario_id', $usuarioId)
            ->findAll();
    }
}
