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
    // Captura o valor de "nome" na URL (fallback para 'Visitante')
    $nome = $_GET['nome'] ?? 'Visitante';
    echo "<p>Olá, <strong>$nome</strong>!</p>";
    ?>
    <hr>

    <h2>Calculadora de Formulário (POST)</h2>
    <?php
    $resultado = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = (int)$_POST['a'];
        $b = (int)$_POST['b'];
        $resultado = $a + $b;
    }
    ?>
    
    <form method="post">
      <input name="a" type="number" placeholder="Digite A">
      <input name="b" type="number" placeholder="Digite B">
      <button type="submit">Somar</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p><strong>Resultado: </strong><?=$resultado?></p>
    <?php endif; ?>

</body>
</html>