<?php


        if(empty($participantes)){
            echo "<p>Nenhum participante encontrado</p>";
            echo "<a href='../view/participantes/cadastro.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='view/participantes/cadastro.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Ações</th></tr>";

        foreach($participantes as $participante){
            $id = $participante['id'];
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$participante['nome']}</td>";
            echo "<td>{$participante['email']}</td>";
            echo "<td>
                <a href='view/participantes/editar.php?id={$id}'>Editar</a> |
                <a href='view/participantes/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?')\">Deletar</a>
                </td>";
            
            echo "</tr>";    
        }

        echo "</table>";
    


?>