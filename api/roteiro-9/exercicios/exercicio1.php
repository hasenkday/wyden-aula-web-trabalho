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
    <h2>Calculadora de Média Escolar (Precisa criar endpoint para o post do form interno)</h2>

    <?php
      function media($a,$b,$c) {
        return ($a + $b + $c) / 3;
      }
    ?>
    
    <?php
      $resultado = null;
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $a = (int)$_POST['a'];
          $b = (int)$_POST['b'];
          $b = (int)$_POST['c'];
          $resultado =$this->media($a, $b, $c);
      }
    ?>
    
    <form method="post">
      <input name="a" type="number" placeholder="Digite Nota A">
      <input name="b" type="number" placeholder="Digite Nota B">
      <input name="c" type="number" placeholder="Digite Nota C">
      <button type="submit">Calcular média</button>
    </form>

    <?php if ($resultado !== null): ?>
      <p><strong>Resultado: </strong><?=$resultado?></p>
    <?php endif; ?>

</body>
</html>