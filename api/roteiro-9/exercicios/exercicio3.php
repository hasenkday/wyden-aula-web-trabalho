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
    <h2>Alterando String (Este também precisa de endpoint para o GET)</h2>
    
    <?php
      // Definição e chamada de função
      function saudacao($nome) {
          return "Olá, $nome!";
      }
      
      $resultado = null;
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $a = (int)$_GET['name'];
          $resultado = strtoupper($name);
      }
    ?>

    <form method="get">
      <input name="name" type="text" placeholder="Digite um nome">
      <button type="submit">Transformar em CAPS</button>
    </form>

</body>
</html>