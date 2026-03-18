<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

if (!isset($_SESSION['participante'])) {
    header("Location: login.php");
    exit;
}

$participante = $_SESSION['participante'];


$stmt = $pdo->query("SELECT * FROM eventos ORDER BY data ASC");
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2>Bem-vindo, <?php echo $participante['nome']; ?></h2>

<div style="margin-bottom: 15px;">
    <?php if ($participante['tipo'] == 'admin'): ?>
        <a class="btn btn-success" href="../admin/index.php">Admin</a>
    <?php endif; ?>

    <a class="btn btn-danger" href="logout.php">Sair</a>
</div>

<h3>Eventos disponíveis</h3>

<?php foreach ($eventos as $evento): 

$stmtCount = $pdo->prepare("SELECT COUNT(*) as total FROM inscricoes WHERE evento_id = :id");
$stmtCount->execute([':id' => $evento['id']]);
$total = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];


$stmtCheck = $pdo->prepare("SELECT * FROM inscricoes WHERE evento_id = :evento AND participante_id = :participante");
$stmtCheck->execute([
    ':evento' => $evento['id'],
    ':participante' => $participante['id']
]);

$jaInscrito = $stmtCheck->rowCount() > 0;

?>

<div class="card">
    <h3><?php echo $evento['nome']; ?></h3>
    <p><?php echo $evento['descricao']; ?></p>

    <p>
        📅 <?php echo $evento['data']; ?> |
        ⏰ <?php echo $evento['horario']; ?>
    </p>

    <p>📍 <?php echo $evento['local']; ?></p>

    <p><b>Vagas:</b> <?php echo "$total / {$evento['max_participantes']}"; ?></p>

    <?php if ($jaInscrito): ?>
    <span style="color:green;">Já inscrito</span><br><br>

    <a class="btn btn-danger" 
       href="../usuario/cancelarInscricao.php?id=<?php echo $evento['id']; ?>"
       onclick="return confirm('Deseja cancelar a inscrição?')">
        Cancelar inscrição
    </a>

    <?php elseif ($total < $evento['max_participantes']): ?>
        <a class="btn" href="../usuario/inscrever.php?id=<?php echo $evento['id']; ?>">
            Inscrever
        </a>

    <?php else: ?>
        <span style="color:red;">Lotado</span>
    <?php endif; ?>
</div>

<?php endforeach; ?>

</div>