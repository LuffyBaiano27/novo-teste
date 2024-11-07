<?php
require 'db/config.php';
if ($_POST) {
    $cliente = $_POST['nome'];
    $tel = $_POST['telefone'];
    $end = $_POST['endereco'];
    $pizza = $_POST['pizza'];
    $qtd = $_POST['quantidade'];
    $preco = $pdo->query("SELECT preco FROM pizzas WHERE id=$pizza")->fetchColumn();
    $total = $preco * $qtd;

    $sql = "INSERT INTO pedidos (nome_cliente, telefone, endereco, pizza_id, quantidade, total)
            VALUES ('$cliente', '$tel', '$end', $pizza, $qtd, $total)";
    $pdo->query($sql);
    echo "Pedido realizado!";
}
?>
<form method="post">
    <input type="text" name="nome" placeholder="Seu Nome">
    <input type="text" name="telefone" placeholder="Telefone">
    <input type="text" name="endereco" placeholder="Endereço">
    <button type="submit">Finalizar</button>
</form>
