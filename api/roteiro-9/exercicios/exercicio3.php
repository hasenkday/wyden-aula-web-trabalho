<!-- 
3. Alteração de Strings com GET e Manual PHP:
Acesse o manual do PHP para consultar o funcionamento do comando `strtoupper()` e, em seguida, aplique essa função na leitura do parâmetro "nome" digitado via GET, garantindo que a resposta apareça apenas com letras maiúsculas na tela.
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste PHP</title>
</head>
<body>
    <h2>Alterando String</h2>
    
    <?php
        function saudacao($nome) {
            return 'Olá, ' . strtoupper($nome) . '!';
        }
      
        $resultado = null;

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name'])) {
            $nome = trim($_GET['name']);

            if ($nome !== '') {
                $resultado = saudacao($nome);
            }
        }
    ?>

    <form method="get">
      <input name="name" type="text" placeholder="Digite um nome" value="<?= htmlspecialchars($_GET['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
      <button type="submit">Transformar em CAPS</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p>
            <strong>Resultado:</strong>
            <?= htmlspecialchars($resultado, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

</body>
</html>