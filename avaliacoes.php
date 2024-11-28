<?php
require 'banco_de_dados.php';
$sql = "SELECT setores.nome AS setor, perguntas.texto AS pergunta, 
        avaliacoes.resposta, avaliacoes.data_hora
        FROM avaliacoes
        JOIN setores ON avaliacoes.id_setor = setores.id
        JOIN perguntas ON avaliacoes.id_pergunta = perguntas.id
        ORDER BY avaliacoes.data_hora DESC";

$result = pg_query($conn, $sql);
?>
<table>
    <thead>
        <tr>
            <th>Setor</th>
            <th>Pergunta</th>
            <th>Resposta</th>
            <th>Data/Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = pg_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['setor']) ?></td>
            <td><?= htmlspecialchars($row['pergunta']) ?></td>
            <td><?= htmlspecialchars($row['resposta']) ?></td>
            <td><?= htmlspecialchars($row['data_hora']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
