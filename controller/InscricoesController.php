<?php
require_once 'C:/Turma2/xampp/htdocs/gerenciamento-eventos/model/InscricoesModel.php';

class InscricoesController{

private $inscricoesModel;

    public function __construct($pdo){
        $this->inscricoesModel = new InscricoesModel($pdo);
    }

    public function listar() {
    $inscricoes = $this->inscricoesModel->listar();
    require __DIR__ . '/../view/inscricoes/listar.php';
}

public function editar($evento_id, $participante_id, $id){
        $this->inscricoesModel->editar($evento_id, $participante_id, $id);
    }

    public function deletar($id){
        $usuario = $this->inscricoesModel->deletar($id);
        return $usuario;
    }

}