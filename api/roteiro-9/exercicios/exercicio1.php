<!-- 
1. Calculadora de Média Escolar:
Crie uma função em PHP chamada `media($a,$b,$c)` que tenha como regra de negócio calcular e retornar a média de três notas recebidas.
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 1</title>
</head>
<body>
    <h2>Calculadora de Média Escolar</h2>
    
    <?php
      function media($a,$b,$c) {
        return ($a + $b + $c) / 3;
      }

      $resultado = null;
      $erro = '';

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_FLOAT);
        $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_FLOAT);
        $c = filter_input(INPUT_POST, 'c', FILTER_VALIDATE_FLOAT);

        if ($a === false || $a === null ||
            $b === false || $b === null ||
            $c === false || $c === null) {
            $erro = 'Preencha as três notas corretamente.';
        } else {
            $resultado = media($a, $b, $c);
        }
      }
    ?>
    
    <form method="post" action="">
      <input name="a" type="number" step="any" placeholder="Digite Nota A" required>
      <input name="b" type="number" step="any" placeholder="Digite Nota B" required>
      <input name="c" type="number" step="any" placeholder="Digite Nota C" required>
      <button type="submit">Calcular média</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p>
            <strong>Resultado:</strong>
            <?= number_format($resultado, 2, ',', '.') ?>
        </p>
    <?php endif; ?>

</body>
</html>