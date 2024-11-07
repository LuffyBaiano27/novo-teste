<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Configuração do e-mail
    $to = 'contato@unipizza.com.br'; // E-mail da pizzaria
    $subject = 'Mensagem de Contato - UniPizza';
    $body = "Nome: $nome\n";
    $body .= "Email: $email\n";
    $body .= "Mensagem: $mensagem\n";
    $headers = "From: $email";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        $feedback = "Mensagem enviada com sucesso! Obrigado por entrar em contato.";
    } else {
        $feedback = "Erro ao enviar a mensagem. Por favor, tente novamente mais tarde.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contato - UniPizza</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">UniPizza</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="cardapio.php">Cardápio</a></li>
                <li class="nav-item"><a class="nav-link" href="pedido.php">Pedido</a></li>
                <li class="nav-item active"><a class="nav-link" href="contato.php">Contato</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Fale Conosco</h1>
        <p>Preencha o formulário abaixo para entrar em contato conosco. Responderemos o mais breve possível.</p>

        <?php if (isset($feedback)): ?>
            <div class="alert alert-info"><?= $feedback ?></div>
        <?php endif; ?>

        <form method="POST" action="contato.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail" required>
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Sua mensagem" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Enviar</button>
        </form>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; <?= date('Y') ?> UniPizza. Todos os direitos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
