<!-- ETAPA 3: LAÇOS DE REPETIÇÃO E CONTROLE DE FLUXO

Conceito:

* for: Utilizado quando o número de iterações é previamente determinado.

* while: Repete um bloco enquanto a condição for verdadeira (valida antes).

* do...while: Executa o bloco ao menos uma vez antes de testar a condição.

* foreach: Estrutura especializada na varredura de arrays/vetores.

* break: Interrompe e encerra o laço de repetição imediatamente.

* continue: Pula a iteração atual e avança para a próxima.

-->


<?php
// For
echo "Contagem com FOR:\n";
for ($i = 1; $i <= 3; $i++) {
    echo "Número: $i\n";
}

// While com Break e Continue
echo "\nContagem com WHILE:\n";
$contador = 0;
while ($contador < 15) {
    $contador++;
    if ($contador == 3) {
        echo "Pulando o 3...\n";
        continue; // Pula a iteração
    }
    if ($contador == 8) {
        echo "Parando no 8!\n";
        break; // Interrompe o laço
    }
    echo "Contador: $contador\n";
}

// Foreach
echo "\nLista com FOREACH:\n";
$tecnologias = ["HTML", "CSS", "PHP"];
foreach ($tecnologias as $tec) {
    echo "- $tec\n";
}
?>