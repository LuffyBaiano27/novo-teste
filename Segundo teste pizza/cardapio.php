<?php
require 'db/config.php';
$pizzas = $pdo->query("SELECT * FROM pizzas")->fetchAll();
?>
<h1>Nosso Cardápio</h1>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza): ?>
        <div class="col-md-4">
            <h3><?= $pizza['nome'] ?></h3>
            <p><?= $pizza['descricao'] ?></p>
            <p>R$ <?= $pizza['preco'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
