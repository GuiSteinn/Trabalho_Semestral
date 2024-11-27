let perguntaAtual = 0;
const perguntas = document.querySelectorAll('.pergunta');
const botaoAnterior = document.getElementById('botao-anterior');
const botaoProximo = document.getElementById('botao-proximo');
const comentario = document.getElementById('comentario');

// Lógica para trocar de pergunta
function mostrarPergunta(index) {
    perguntas.forEach((pergunta, i) => {
        pergunta.style.display = i === index ? 'block' : 'none';
    });

    // Atualizar estado dos botões
    botaoAnterior.disabled = index === 0;
    botaoProximo.textContent = index === perguntas.length - 1 ? 'Finalizar' : 'Próxima';
}

// Event listener para os botões
botaoAnterior.addEventListener('click', () => {
    if (perguntaAtual > 0) {
        perguntaAtual--;
        mostrarPergunta(perguntaAtual);
    }
});

botaoProximo.addEventListener('click', () => {
    if (perguntaAtual < perguntas.length - 1) {
        perguntaAtual++;
        mostrarPergunta(perguntaAtual);
    } else {
        // Enviar os dados
        const respostas = {};
        perguntas.forEach((pergunta) => {
            const selecionado = pergunta.querySelector('.valor.selecionado');
            const id = pergunta.getAttribute('data-pergunta-id');
            respostas[id] = selecionado ? selecionado.dataset.valor : null;
        });

        const dados = {
            respostas,
            comentario: comentario.value,
        };

        console.log('Dados enviados:', dados);

        // Aqui você pode usar fetch() para enviar os dados ao servidor
        alert('Obrigado pela avaliação!');
    }
});

// Adicionar seleção aos botões de escala
document.querySelectorAll('.valor').forEach((botao) => {
    botao.addEventListener('click', (e) => {
        const escala = e.target.parentElement;
        escala.querySelectorAll('.valor').forEach((btn) => btn.classList.remove('selecionado'));
        e.target.classList.add('selecionado');
    });
});

// Mostrar a primeira pergunta ao carregar a página
mostrarPergunta(perguntaAtual);
