<?php

use Core\Library\Session;

if (! function_exists('setValor')) {

    /**
     * setValor
     *
     * @param string $campo
     * @param mixed $default
     * @return mixed
     */
    function setValor($campo, $default = "")
    {
        if (isset($_POST[$campo])) {
            return $_POST[$campo];
        } else {
            return $default;
        }
    }

}

if (! function_exists('setMsgFilderError')) {
    /**
     * setMsgFilderError
     *
     * @param string $campo
     * @return string
     */
    function setMsgFilderError($campo)
    {
        $cRet   = '';

        if (isset($_POST['formErrors'][$campo])) {
            $cRet .= '<div class="mt-2 text-danger">';
                $cRet .= $_POST['formErrors'][$campo];
            $cRet .= '</div>';
        }

        return $cRet;
    }
}

if (!function_exists('exibeAlerta')) {
    /**
     * exibeAlerta
     *
     * @return string
     */
    function exibeAlerta()
    {
        $msgSucesso = Session::getDestroy('msgSucesso');
        $msgError   = Session::getDestroy('msgError');
        $msgAlerta  = Session::getDestroy('msgAlerta');

        $mensagem   = '';
        $tipo       = 'info'; // padrão

        if ($msgSucesso != "") {
            $mensagem = $msgSucesso;
            $tipo     = 'success';
        } elseif ($msgError != "") {
            $mensagem = $msgError;
            $tipo     = 'error';
        } elseif ($msgAlerta != "") {
            $mensagem = $msgAlerta;
            $tipo     = 'warning';
        }

        if ($mensagem == "") {
            return "";
        }

        return "<script>showToast(" . json_encode($mensagem) . ", '$tipo');</script>";
    }
}

if (! function_exists('datatables')) {
    /**
     * datatables
     *
     * @param string $idTable
     * @return string
     */
    function datatables($idTable)
    {
        return '
            <script src="' . baseUrl() . 'assets/DataTables/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#' . $idTable . '").DataTable({
                        language:   {
                                        "sEmptyTable":      "Nenhum registro encontrado",
                                        "sInfo":            "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                        "sInfoEmpty":       "Mostrando 0 até 0 de 0 registros",
                                        "sInfoFiltered":    "(Filtrados de _MAX_ registros)",
                                        "sInfoPostFix":     "",
                                        "sInfoThousands":   ".",
                                        "sLengthMenu":      "_MENU_ resultados por página",
                                        "sLoadingRecords":  "Carregando...",
                                        "sProcessing":      "Processando...",
                                        "sZeroRecords":     "Nenhum registro encontrado",
                                        "sSearch":          "Pesquisar",
                                        "oPaginate": {
                                            "sNext":        "Próximo",
                                            "sPrevious":    "Anterior",
                                            "sFirst":       "Primeiro",
                                            "sLast":        "Último"
                                        },
                                        "oAria": {
                                            "sSortAscending":   ": Ordenar colunas de forma ascendente",
                                            "sSortDescending":  ": Ordenar colunas de forma descendente"
                                        }
                                    }
                    });
                });
            </script>';
    }
}
