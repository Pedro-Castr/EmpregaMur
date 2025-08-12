<?php

namespace App\Model;

use Core\Library\ModelMain;

class CandidaturaModel extends ModelMain
{
    protected $table = "vaga_curriculum";

    public function getCandidatosComUsuario($vagaId)
    {
        return $this->db->table($this->table)
            ->select('vaga_curriculum.curriculum_id, usuario.usuario_id, usuario.nome, usuario.login, vaga_curriculum.dateCandidatura, curriculum.foto')
            ->join('curriculum', 'curriculum.curriculum_id = vaga_curriculum.curriculum_id')
            ->join('usuario', 'usuario.pessoa_fisica_id = curriculum.pessoa_fisica_id')
            ->where('vaga_curriculum.vaga_id', $vagaId)
            ->findAll();
    }
}
