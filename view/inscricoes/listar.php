<?php
echo "<section>";

echo "<h1>Inscrições</h1>";

if(empty($inscricoes)){
    echo "<div class='links'>";
    echo "<p>Nenhuma inscrição encontrada!</p>";
    
echo "</div>";
    return;
}


echo "<table border='1' cellpadding='5' cellspacing='0' class='tabela'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Evento</th>
            <th>Participante</th>
        </tr>
      </thead>
      <tbody>";

foreach($inscricoes as $inscricao){
    $id = $inscricao['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$inscricao['evento_nome']}</td>";
    echo "<td>{$inscricao['participante_nome']}</td>";

    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
