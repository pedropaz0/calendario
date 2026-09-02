<?php
namespace App\Model;

use PDO;

class Task {
    public static function listarPorData($data, $usuario_id) {
        $stmt = Connection::getConn()->prepare("SELECT * FROM tarefas WHERE data_tarefa = :data AND usuario_id = :u_id ORDER BY id DESC");
        $stmt->bindValue(':data', $data);
        $stmt->bindValue(':u_id', $usuario_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function criar($titulo, $descricao, $data, $usuario_id) {
        $stmt = Connection::getConn()->prepare("INSERT INTO tarefas (titulo, descricao, data_tarefa, status, usuario_id) VALUES (:titulo, :descricao, :data_t, 'pendente', :u_id)");
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':data_t', $data);
        $stmt->bindValue(':u_id', $usuario_id);
        return $stmt->execute();
    }

    public static function alternarStatus($id, $usuario_id) {
        $stmt = Connection::getConn()->prepare("UPDATE tarefas SET status = IF(status = 'pendente', 'concluida', 'pendente') WHERE id = :id AND usuario_id = :u_id");
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':u_id', $usuario_id);
        return $stmt->execute();
    }

    public static function deletar($id, $usuario_id) {
        $stmt = Connection::getConn()->prepare("DELETE FROM tarefas WHERE id = :id AND usuario_id = :u_id");
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':u_id', $usuario_id);
        return $stmt->execute();
    }
}