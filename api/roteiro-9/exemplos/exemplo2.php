<!-- 
**ETAPA 2: VARIÁVEIS E ESTRUTURAS DE DECISÃO**

* Variáveis: São definidas pelo símbolo cifrão (`$`) para armazenar textos, números, entre outros tipos de dados.
* Estruturas de Decisão: Utilizamos `if`, `elseif` e `else` para realizar a tomada de decisão com base em valores e condições lógicas estipuladas.
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Variáveis e Decisão</title>
</head>
<body>
    <h2>Variáveis e Estruturas de Decisão</h2>

    <?php
    // Uso de variáveis e interpolação
    $nome = "Hase";
    $ano = 2025;
    echo "<p>Bem-vindo, $nome! Estamos em $ano.</p>";

    // Avaliação condicional
    $nota = 85;
    echo "Sua nota é $nota. Classificação: ";

    if ($nota >= 90) {
        echo "A";
    } elseif ($nota >= 80) {
        echo "B";
    } elseif ($nota >= 70) {
        echo "C";
    } else {
        echo "D";
    }
    ?>

</body>
</html>