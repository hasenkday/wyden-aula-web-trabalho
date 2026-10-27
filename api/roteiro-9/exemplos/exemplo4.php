<!-- 
**ETAPA 4: FUNÇÕES, STRINGS E DATAS**

* function: Comando utilizado para criar regras de negócio em blocos de código isolados que podem ser chamados posteriormente.
* Strings: É possível modificar formatações de textos usando funções nativas do PHP (como `strtoupper()` e `ucfirst()`).
* Data e Hora: Extraídas e formatadas a partir da função nativa `date()` aliada à configuração correta de fuso horário `date_default_timezone_set()`.
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Funções, Textos e Datas</title>
</head>
<body>
    <h2>Funções e Métodos Nativos</h2>

    <?php
    // Definição e chamada de função
    function saudacao($nome) {
        return "Olá, $nome!";
    }
    echo "<p>" . saudacao("Maria") . "</p>";

    // Operações com Strings
    $texto = "php é divertido!";
    echo "Texto em maiúsculas: " . strtoupper($texto) . "<br>";

    // Exibição de Data e Hora
    date_default_timezone_set('America/Sao_Paulo');
    echo "Data de hoje: " . date("d/m/Y") . "<br>";
    echo "Hora atual: " . date("H:i:s") . "<br>";
    ?>

</body>
</html>