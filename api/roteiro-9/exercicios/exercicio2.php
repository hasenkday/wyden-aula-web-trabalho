<!-- 
2. Formulário com Operações Matemáticas Múltiplas:
Adapte a calculadora via formulário POST (presente na Etapa 5) para que, além de somar, ela inclua os cálculos lógicos para subtração, multiplicação e divisão.
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste PHP</title>
</head>
<body>
    <h2>Caluladora Básica</h2>
    
    <?php
      function calc($notaA, $notaB, $option) {
        if ($option === '+') {
            return $notaA + $notaB;
        } elseif ($option === '-') {
            return $notaA - $notaB;
        } elseif ($option === '*') {
            return $notaA * $notaB;
        } elseif ($option === '/') {
            if ($notaB == 0) {
                return 'Não é possível dividir por zero.';
            }

            return $notaA / $notaB;
        }

        return 'Operação inválida.';
      }
  
      $resultado = null;
      $option = null;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $a = $_POST['a'] ?? '';
          $b = $_POST['b'] ?? '';
          $option = $_POST['option'] ?? '';

          if ($a === '' || $b === '' ||
              !is_numeric($a) || !is_numeric($b)) {
              $erro = 'Digite dois números válidos.';
          } else {
              $resultado = calc((float) $a, (float) $b, $option);
          }
      }
    ?>
    
    <form method="post" action="" style="display:flex; flex-direction:row; gap: 10px;">
      <input name="a" step="any" type="number" style="max-width: 100px" placeholder="Digite A" required>
      <input name="b" step="any" type="number" style="max-width: 100px" placeholder="Digite B" required>
      
      <button type="submit" name="option" value="+">+</button>
      <button type="submit" name="option" value="-">-</button>
      <button type="submit" name="option" value="*">*</button>
      <button type="submit" name="option" value="/">/</button>
    </form>

    <?php if ($erro !== ''): ?>
        <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <?php if ($resultado !== null): ?>
      <p>
          <strong>Resultado:</strong>
          <?= is_numeric($resultado)
              ? number_format($resultado, 0, ',', '.')
              : htmlspecialchars($resultado, ENT_QUOTES, 'UTF-8') ?>
      </p>
    <?php endif; ?>
</body>
</html>