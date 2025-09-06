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
}
