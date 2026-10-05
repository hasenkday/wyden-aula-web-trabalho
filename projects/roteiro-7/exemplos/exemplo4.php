<!-- ETAPA 4: FUNÇÕES E MODULARIZAÇÃO

Conceito:

* function: Blocos de código reutilizáveis e isolados.

* Parâmetros: Dados recebidos pela função para processamento.

* return: Envia a resposta processada de volta ao código chamador.

-->


<?php
// Função simples com retorno
function saudacao($nome) {
    return "Olá, " . $nome . "! Bem-vindo(a) ao sistema.\n";
}
echo saudacao("Aluno");

// Função com regras de negócio (Cálculo de Comissão)
function calcularComissao($valorVenda) {
    $percentual = 0.10; // 10% de comissão
    return $valorVenda * $percentual;
}

$venda = 1500.00;
$comissao = calcularComissao($venda);
echo "Valor da venda: R$ $venda\n";
echo "Comissão gerada: R$ $comissao\n";
?>