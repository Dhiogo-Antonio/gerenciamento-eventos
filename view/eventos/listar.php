<?php
echo "<section>";

echo "<h1>Gerenciamento de Eventos</h1>";

if(empty($eventos)){
    echo "<div class='links'>";
    echo "<p>Nenhum evento encontrado!</p>";
    echo "<br>
<a href='../view/eventos/cadastro.php' class='cadastro'>Cadastrar novo evento</a>";
echo "</div>";
    return;
}

echo "<tr><td><a href='../view/eventos/cadastro.php'>Cadastrar</a></td></tr>";
echo "<table border='1' cellpadding='5' cellspacing='0' class='tabela'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Local</th>
            <th>Máximo de Participantes</th>
            <th>Açoes</th>
        </tr>
      </thead>
      <tbody>";

foreach($eventos as $evento){
    $id = $evento['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$evento['nome']}</td>";
    echo "<td>{$evento['descricao']}</td>";
    echo "<td>{$evento['data']}</td>";
    echo "<td>{$evento['horario']}</td>";
    echo "<td>{$evento['local']}</td>";
    echo "<td>{$evento['max_participantes']}</td>";
    echo "<td>
            <a href='../view/eventos/editar.php?id={$id}' class='btn btn-editar'>Editar</a> <br><br><br>
            <a href='../view/eventos/deletar.php?id={$id}' class='btn btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir este evento?')\">Deletar</a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
