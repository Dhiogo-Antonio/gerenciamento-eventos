<?php

class InscricoesModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

     public function buscarTodos(){
        $stmt = $this->pdo->query('SELECT * FROM inscricoes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function listar(){
        $sql = "
        SELECT 
            i.id,
            e.nome AS evento_nome,
            p.nome AS participante_nome
        FROM inscricoes i
        INNER JOIN eventos e ON i.evento_id = e.id
        INNER JOIN participantes p ON i.participante_id = p.id
    ";

    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function editar($evento_id, $participante_id, $id){
        $sql = "UPDATE inscricoes SET evento_id=?, participante_id=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$evento_id, $participante_id, $id]); 
    }

       public function deletar($id){
        $sql = "DELETE FROM inscricoes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

}