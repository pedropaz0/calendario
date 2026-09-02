<?php
namespace App\Controller;

use App\Model\Task;

class TaskController {
    private function verificarAutenticacao() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function index() {
        $this->verificarAutenticacao();
        $data = $_GET['data'] ?? date('Y-m-d');
        $usuario_id = $_SESSION['usuario_id'];
        $tarefas = Task::listarPorData($data, $usuario_id);
        
        require_once 'View/home.php';
    }

    public function cadastrar() {
        $this->verificarAutenticacao();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            
            // Pega a data selecionada no POST ou usa a data atual se estiver vazio
            $data = !empty($_POST['data_tarefa']) ? $_POST['data_tarefa'] : date('Y-m-d');
            $usuario_id = $_SESSION['usuario_id'];

            if ($titulo && $data) {
                Task::criar($titulo, $descricao, $data, $usuario_id);
            }
            
            // Redireciona a tela exibindo o dia em que o evento foi salvo
            header("Location: index.php?data=" . $data);
            exit;
        }
    }

    public function alternarStatus() {
        $this->verificarAutenticacao();
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $data = $_GET['data'] ?? date('Y-m-d');
        if ($id) {
            Task::alternarStatus($id, $_SESSION['usuario_id']);
        }
        header("Location: index.php?data=" . $data);
        exit;
    }

    public function excluir() {
        $this->verificarAutenticacao();
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $data = $_GET['data'] ?? date('Y-m-d');
        if ($id) {
            Task::deletar($id, $_SESSION['usuario_id']);
        }
        header("Location: index.php?data=" . $data);
        exit;
    }
}