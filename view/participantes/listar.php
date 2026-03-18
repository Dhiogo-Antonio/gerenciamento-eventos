<?php
echo "<section id='eventos'>";

echo "<h1>Gerenciamento de Participantes</h1>";

if(empty($participantes)){
    echo "<div class='links'>";
    echo "<p>Nenhum participante encontrado!</p>";
    echo "<br>
<a href='../view/participantes/cadastro.php' class='cadastro'>Cadastrar novo participante</a>";
echo "</div>";
    return;
}

echo "<tr><td><a href='../view/participantes/cadastro.php'>Cadastrar</a></td></tr>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>";

foreach($participantes as $participante){
    $id = $participante['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$participante['nome']}</td>";
    echo "<td>{$participante['email']}</td>";
    echo "<td>{$participante['telefone']}</td>";
    echo "<td>{$participante['tipo']}</td>";
    echo "<td>
            <a href='../view/participantes/editar.php?id={$id}' class='btn-editar'>Editar</a> |
            <a href='../view/participantes/deletar.php?id={$id}' class='btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir este participante?')\">Deletar</a> |
            
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
