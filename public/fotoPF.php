<?php

use Core\Library\Ambiente;
use Core\Library\Database;

defined('PATHAPP') || define("PATHAPP", ".." . DIRECTORY_SEPARATOR);
require_once PATHAPP . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

// Carrega variáveis do .env para $_ENV
$ambiente = new Ambiente();
$ambiente->load();

// Verifica se o parâmetro id foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo "ID não informado";
    exit;
}

$id = (int) $_GET['id'];

// Cria conexão com o banco usando dados do $_ENV
$db = new Database(
    $_ENV['DB_CONNECTION'] ?? '',
    $_ENV['DB_HOST'] ?? '',
    $_ENV['DB_PORT'] ?? '',
    $_ENV['DB_DATABASE'] ?? '',
    $_ENV['DB_USER'] ?? '',
    $_ENV['DB_PASSWORD'] ?? ''
);

$db->table('curriculum');

try {
    // Consulta a imagem pelo curriculum_id
    $resultado = $db->select('foto')->where('curriculum_id', $id)->first();

    if (!$resultado || empty($resultado['foto'])) {
        http_response_code(404);
        echo "Imagem não encontrada";
        exit;
    }

    // Envia cabeçalho correto para imagem
    header("Content-Type: image/png");
    echo $resultado['foto'];
} catch (Exception $e) {
    http_response_code(500);
    echo "Erro ao acessar o banco: " . $e->getMessage();
    exit;
}
