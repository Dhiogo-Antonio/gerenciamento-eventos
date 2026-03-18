<?php

class EventosModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

     public function buscarTodos(){
        $stmt = $this->pdo->query('SELECT * FROM eventos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function listar(){
        $eventos = $this->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/view/eventos/listar.php";
        return;
    }

    public function buscarEvento($id) {
        $stmt = $this->pdo->query("SELECT * FROM eventos WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $descricao, $data, $horario, $local, $max_participantes){
        $sql = "INSERT INTO eventos (nome, descricao, data, horario, local, max_participantes) VALUES (:nome, :descricao, :data, :horario, :local, :max_participantes)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':data' => $data,
            ':horario' => $horario,
            ':local' => $local,
            ':max_participantes' => $max_participantes

        ]);
    }

    public function editar($nome, $descricao, $data, $horario, $local, $max_participantes, $id){
        $sql = "UPDATE eventos SET nome=?, descricao=?, data=?, horario=?, local=?, max_participantes=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $descricao, $data, $horario, $local, $max_participantes, $id]); 
    }

       public function deletar($id){
        $sql = "DELETE FROM eventos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }


}