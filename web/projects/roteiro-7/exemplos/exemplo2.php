<!-- ETAPA 2: ESTRUTURAS CONDICIONAIS (TOMADA DE DECISÃO)

Conceito:

* if / elseif / else: Avalia uma série de condições lógicas em ordem.

* Operador Ternário: Abreviação para tomadas de decisão simples (condicao ? verdadeiro : falso).

* switch / case / default: Estrutura para comparar uma mesma variável com múltiplos valores fixos.
-->


<?php
$idade = 20;

// if / elseif / else
if ($idade < 18) {
    echo "Menor de idade.\n";
} elseif ($idade == 18) {
    echo "Exatamente 18 anos.\n";
} else {
    echo "Maior de idade.\n";
}

// Operador Ternário
$status = ($idade >= 18) ? "Pode dirigir" : "Não pode dirigir";
echo "Status: $status\n";

// Switch / Case
$perfil = "admin";
switch ($perfil) {
    case "admin":
        echo "Acesso total liberado.\n";
        break;
    case "usuario":
        echo "Acesso restrito.\n";
        break;
    default:
        echo "Perfil não encontrado.\n";
        break;
}
?>