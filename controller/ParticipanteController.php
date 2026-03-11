<?php
require_once 'C:/Turma2/xampp/htdocs/gerenciamento-eventos/model/ParticipanteModel.php';

class ParticipanteController{

private $participanteModel;

    public function __construct($pdo){
        $this->participanteModel = new ParticipanteModel($pdo);
    }

      public function listar(){
        $usuarios = $this->participanteModel->buscarTodos();
       include_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/view/participantes/listar.php";
       return;
    }

     public function buscarUsuario($id){
        $usuario = $this->participanteModel->buscarUsuario($id);
        return $usuario;
    }

   public function cadastrar($nome, $email, $telefone){
        return $this->participanteModel->cadastrar($nome, $email, $telefone);
    }

    public function editar($nome, $email, $telefone, $id){
        $this->participanteModel->editar($nome, $email, $telefone, $id);
    }

    public function deletar($id){
        $usuario = $this->participanteModel->deletar($id);
        return $usuario;
    }
}

?>