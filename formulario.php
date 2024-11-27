<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Formulário de Feedback</h1>
    <form action="avaliacoes.php" method="POST">
        <?php foreach ($perguntas as $pergunta): ?>
            <div>
                <label for="pergunta_<?= $pergunta['id']; ?>"><?= $pergunta['texto']; ?></label>
                <input type="number" name="respostas[<?= $pergunta['id']; ?>]" id="pergunta_<?= $pergunta['id']; ?>" min="0" max="10" required>
            </div>
        <?php endforeach; ?>
        <div>
            <label for="comentario">Comentário opcional:</label>
            <textarea name="comentario" id="comentario" rows="4"></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
