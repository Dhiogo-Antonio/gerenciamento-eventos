<?php
require_once 'C:/Turma2/xampp/htdocs/gerenciamento-eventos/model/ParticipanteModel.php';

class ParticipanteController{

private $participanteModel;

    public function __construct($pdo){
        $this->participanteModel = new ParticipanteModel($pdo);
    }

      public function listar(){
        $participantes = $this->participanteModel->buscarTodos();
       include_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/view/participantes/listar.php";
       return;
    }

     public function buscarUsuario($id){
        $participantes = $this->participanteModel->buscarUsuario($id);
        return $participantes;
    }

   public function cadastrar($nome, $email, $telefone, $senha){
        return $this->participanteModel->cadastrar($nome, $email, $telefone, $senha);
    }

     public function login($email, $senha){
    return $this->participanteModel->login($email, $senha);
    }

    public function editar($nome, $email, $telefone, $senha, $id){
        $this->participanteModel->editar($nome, $email, $telefone, $senha, $id);
    }

    public function deletar($id){
        $usuario = $this->participanteModel->deletar($id);
        return $usuario;
    }
}

?>