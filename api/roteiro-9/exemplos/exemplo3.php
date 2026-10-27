<!-- 
**ETAPA 3: LAÇOS DE REPETIÇÃO E ARRAYS**

* for: Estrutura de repetição clássica para iterar comandos com contagem e limite.
* Arrays: Conjuntos de dados guardados em uma única variável.
* foreach: Laço de repetição ideal para iterar sobre todos os elementos presentes num array.
-->

<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Laços e Arrays</title>
</head>
<body>
    <h2>Laços e Arrays</h2>

    <?php
    // Laço for
    echo "<h3>Contagem com FOR:</h3>";
    for ($i = 1; $i <= 5; $i++) {
        echo "Número: $i <br>";
    }

    // Array com laço foreach
    echo "<h3>Cursos com FOREACH:</h3>";
    $cursos = ["Computação", "ADS", "Engenharia"];
    foreach ($cursos as $curso) {
        echo "Curso: $curso <br>";
    }
    ?>

</body>
</html>