<?php
namespace App\Controller;

use App\Model\User;

class UserController {
    public function login() {
        $erro = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'] ?? '';

            $user = User::buscarPorEmail($email);
            if ($user && password_verify($senha, $user['senha'])) {
                $_SESSION['usuario_id'] = $user['id'];
                $_SESSION['usuario_nome'] = $user['nome'];
                header('Location: index.php');
                exit;
            } else {
                $erro = 'E-mail ou senha inválidos.';
            }
        }
        require_once 'View/login.php';
    }

    public function register() {
        $erro = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'] ?? '';

            if ($nome && $email && strlen($senha) >= 6) {
                if (!User::buscarPorEmail($email)) {
                    User::criar($nome, $email, $senha);
                    header('Location: index.php?action=login');
                    exit;
                } else {
                    $erro = 'E-mail já cadastrado.';
                }
            } else {
                $erro = 'Preencha todos os campos corretamente (senha mín. 6 caracteres).';
            }
        }
        require_once 'View/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}