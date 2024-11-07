// Adicionando comportamento ao formulário de contato
document.addEventListener('DOMContentLoaded', function () {
    
    // Função de scroll suave ao clicar nos links do menu
    const navLinks = document.querySelectorAll('.navbar-nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            if (link.hash !== "") {
                event.preventDefault();
                const hash = link.hash;
                document.querySelector(hash).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Validação do formulário de contato
    const contactForm = document.querySelector('form[action="contato.php"]');
    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const mensagem = document.getElementById('mensagem').value.trim();

            // Verificar se os campos estão preenchidos
            if (nome === "" || email === "" || mensagem === "") {
                alert('Por favor, preencha todos os campos.');
                event.preventDefault();
                return;
            }

            // Confirmação de envio
            const confirmacao = confirm('Deseja realmente enviar esta mensagem?');
            if (!confirmacao) {
                event.preventDefault();
            }
        });
    }

    // Comportamento no formulário de pedido
    const pedidoForm = document.querySelector('form[action="pedido.php"]');
    if (pedidoForm) {
        pedidoForm.addEventListener('submit', function (event) {
            const nome = document.querySelector('input[name="nome"]').value.trim();
            const telefone = document.querySelector('input[name="telefone"]').value.trim();
            const endereco = document.querySelector('input[name="endereco"]').value.trim();

            // Verificar se os campos estão preenchidos
            if (nome === "" || telefone === "" || endereco === "") {
                alert('Por favor, preencha todos os campos do pedido.');
                event.preventDefault();
                return;
            }

            // Confirmação de envio do pedido
            const confirmacao = confirm('Tem certeza de que deseja fazer este pedido?');
            if (!confirmacao) {
                event.preventDefault();
            }
        });
    }
});
