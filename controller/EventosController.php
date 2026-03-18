<?php
require_once 'C:/Turma2/xampp/htdocs/gerenciamento-eventos/model/EventosModel.php';

class EventosController{

private $eventosModel;

    public function __construct($pdo){
        $this->eventosModel = new EventosModel($pdo);
    }

     public function listar(){
        $eventos = $this->eventosModel->buscarTodos();
       include_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/view/eventos/listar.php";
       return;
    }

    public function buscarEvento($id){
        $usuario = $this->eventosModel->buscarEvento($id);
        return $usuario;
    }

   public function cadastrar($nome, $descricao, $data, $horario, $local, $max_participantes){
        return $this->eventosModel->cadastrar($nome, $descricao, $data, $horario, $local, $max_participantes);
    }

    public function editar($nome, $descricao, $data, $horario, $local, $max_participantes, $id){
        $this->eventosModel->editar($nome, $descricao, $data, $horario, $local, $max_participantes, $id);
    }

    public function deletar($id){
        $usuario = $this->eventosModel->deletar($id);
        return $usuario;
    }

}