<?php
// ETAPA 4: FUNÇÕES E MODULARIZAÇÃO

// Conceito:

// * function: Blocos de código reutilizáveis e isolados.
// * Parâmetros: Dados recebidos pela função para processamento.
// * return: Envia a resposta processada de volta ao código chamador.

class Exemplo4Service
{
    public function executar(): array
    {
        function saudacao(string $nome) {
            return "Olá, " . $nome . "! Bem-vindo(a) ao sistema.\n";
        }
        $output = saudacao("Aluno");

        // Função com regras de negócio (Cálculo de Comissão)
        function calcularComissao(float $valorVenda) {
            $percentual = 0.10; // 10% de comissão
            return $valorVenda * $percentual;
        }

        $venda = 1500.00;
        $comissao = calcularComissao($venda);
        $output .= "Valor da venda: R$ $venda\n";
        $output .= "Comissão gerada: R$ $comissao\n";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
