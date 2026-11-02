<!-- 
**ETAPA 5: PROJETO INTEGRADOR (INTERATIVIDADE WEB COM GET E POST)**

Script consolidado mostrando a interação entre as requisições do usuário na página web. O PHP consegue processar formulários via `$_POST` (para segurança e cálculos ocultos) ou manipular dados dinâmicos repassados diretamente na URL via `$_GET`. *(Nota: No ambiente do Coddy Tech, a saída HTML pode exigir atenção à aba de visualização web. A interação GET/POST requer adaptações lógicas caso testada puramente via terminal, mas a estrutura lógica segue os padrões web.)*
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Interatividade Web</title>
</head>
<body>
    <h2>Parâmetros pela URL (GET)</h2>
   
    <?php
        $nome = $_GET['nome'] ?? 'Visitante';
        echo '<p>Olá, <strong>' . htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') . '</strong>!</p>';
    ?>

    <hr>

    <?php
    $resultado = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = (float) ($_POST['a'] ?? 0);
        $b = (float) ($_POST['b'] ?? 0);
        $resultado = $a + $b;
    }
    ?>
    
    <form method="post">
        <input name="a" type="number" step="any" placeholder="Digite A" required>
        <input name="b" type="number" step="any" placeholder="Digite B" required>
        <button type="submit">Somar</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p><strong>Resultado:</strong> <?= $resultado ?></p>
    <?php endif; ?>

</body>
</html>