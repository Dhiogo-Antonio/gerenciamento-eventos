<?php

class ParticipanteModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

     public function buscarTodos(){
        $stmt = $this->pdo->query('SELECT * FROM participantes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function listar(){
        $participantes = $this->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/view/participantes/listar.php";
        return;
    }

    public function buscarUsuario($id) {
        $stmt = $this->pdo->query("SELECT * FROM participantes WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

     public function cadastrar($nome, $email, $telefone, $senha){
        $sql = "INSERT INTO participantes (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':senha' => $senha
        ]);
    }

    public function login($email, $senha,){
    $sql = "SELECT * FROM participantes WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    $participante = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($participante['email'] && $participante['senha']) {

        $_SESSION['participante'] = [
            'id' => $participante['id'],
            'nome' => $participante['nome'],
            'email' => $participante['email'],
            'tipo' => $participante['tipo']
        ];

     if ($participante['tipo'] == 'admin') {

            header("Location: ../admin/index.php");

        } else {

            header("Location: ../public/index.php");
        }
        exit;

    } else {
        $erro = "Email ou senha inválidos!";
    }
   }

    

    public function editar($nome, $email, $telefone, $senha, $id){
        $sql = "UPDATE participantes SET nome=?, email=?, telefone=?, senha=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $telefone, $senha, $id]); 
    }

       public function deletar($id){
        $sql = "DELETE FROM participantes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

}

?>