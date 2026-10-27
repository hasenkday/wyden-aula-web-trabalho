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
    <h2>Caluladora Básica (Precisa criar endpoint para o post dos buttons e separar cada calc por serviço individual)</h2>
    
    <?php
      function calc($notaA, $notaB, $option) {
        if ($notaA || $notaB) {
          return 'Digite números válidos.';
        }
        $result;
        if ($option === '+') $result = $notaA + $notaB;
        else if ($option === '-') $result = $notaA - $notaB;
        else if ($option === '*') $result = $notaA * $notaB;
        else if ($option === '/') $result = $notaB === 0 ? '∞ (divisão por zero)' : $notaA / $notaB;
        return $result;
      }
  
      $resultado = null;
      $option = null;
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $a = (int)$_POST['a'];
          $b = (int)$_POST['b'];
          $option = (int)$POST['option'];
          $resultado = $this->calc($a, $b, $option);
      }
    ?>
    
    <form method="post" style="display:flex; flex-direction:row; gap: 10px;">
      <input name="a" type="number" style="max-width: 100px" placeholder="Digite Nota A">
      <input name="b" type="number" style="max-width: 100px" placeholder="Digite Nota B">
      <input name="c" type="number" style="max-width: 100px" placeholder="Digite Nota C">
      
      <button type="submit">+</button>
      <button type="submit">-</button>
      <button type="submit">*</button>
      <button type="submit">/</button>
    </form>

    <?php if ($resultado !== null): ?>
      <p><strong>Resultado: </strong><?=$resultado?></p>
    <?php endif; ?>

</body>
</html>