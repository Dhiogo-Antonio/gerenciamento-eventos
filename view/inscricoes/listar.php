<?php
echo "<section id='eventos'>";

echo "<h1>Gerenciamento de Inscricoes</h1>";

if(empty($inscricoes)){
    echo "<div class='links'>";
    echo "<p>Nenhuma inscricao encontrada!</p>";
    echo "<br>
<a href='../view/inscricoes/cadastro.php' class='cadastro'>Cadastrar nova inscricao</a>";
echo "</div>";
    return;
}


echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Evento</th>
            <th>Participante</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>";

foreach($inscricoes as $inscricao){
    $id = $inscricao['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$inscricao['evento_nome']}</td>";
    echo "<td>{$inscricao['participante_nome']}</td>";

    echo "<td>
            <a href='../view/inscricoes/editar.php?id={$id}' class='btn-editar'>Editar</a> |
            <a href='../view/inscricoes/deletar.php?id={$id}' class='btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir esta inscricao?')\">Deletar</a>
            
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
