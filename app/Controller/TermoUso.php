<?php

namespace App\Controller;

use Core\Library\ControllerMain;

class TermoUso extends ControllerMain
{
    public function index()
    {
        $this->loadView("login/termoUso", [], $exibeCabRodape = false);
    }
}
