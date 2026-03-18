<?php
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

$participanteController = new ParticipanteController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $participantes = $participanteController->buscarUsuario($id);



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>
    <form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?=$participantes['nome'];?>" required><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?=$participantes['email'];?>" required><br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="<?=$participantes['telefone'];?>" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" value="<?=$participantes['senha'];?>" required><br>

    <input type="submit">
    </form>
</body>
</html>

<?php
} else{
    header('Location: listar.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $participanteController->editar($nome, $email, $telefone, $senha, $id);

    header('Location: ../../admin/index.php');

}

?>
