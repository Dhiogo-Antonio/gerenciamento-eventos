<?php
echo "<section id='eventos' class='secao-participantes'>";

echo "<h1 class='titulo'>Gerenciamento de Participantes</h1>";

if(empty($participantes)){
    echo "<div class='links area-vazia'>";
    echo "<p class='mensagem-vazia'>Nenhum participante encontrado!</p>";
    echo "<br>
<a href='../view/participantes/cadastro.php' class='cadastro btn-cadastro'>Cadastrar novo participante</a>";
    echo "</div>";
    return;
}

echo "<tr><td><a href='../view/participantes/cadastro.php' class='btn-cadastro'>Cadastrar</a></td></tr>";

echo "<table class='tabela' border='1' cellpadding='5' cellspacing='0'>";
echo "<thead class='tabela-cabecalho'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody class='tabela-corpo'>";

foreach($participantes as $participante){
    $id = $participante['id'];

    echo "<tr class='linha'>";
    echo "<td>{$id}</td>";
    echo "<td>{$participante['nome']}</td>";
    echo "<td>{$participante['email']}</td>";
    echo "<td>{$participante['telefone']}</td>";
    echo "<td>{$participante['tipo']}</td>";
    echo "<td class='acoes'>
            <a href='../view/participantes/editar.php?id={$id}' class='btn btn-editar'>Editar</a> |
            <a href='../view/participantes/deletar.php?id={$id}' class='btn btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir este participante?')\">
               Deletar
            </a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>