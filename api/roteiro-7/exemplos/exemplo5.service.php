<?php
// ETAPA 5: PROJETO INTEGRADOR (SISTEMA COMPLETO EM PHP)

// Conceito:

// Script consolidado combinando TODOS os comandos lógicos trabalhados no roteiro.
// Prática Hands-On 5 (Código Completo):

namespace Roteiro7\Exemplos;

class Exemplo5Service
{
    public function executar(): array
    {
        // Projeto Integrador: Sistema de Vendas e Comissões
        function calcularComissao(float $valorVenda) {
            return $valorVenda * 0.10; // 10% de comissão
        }

        // Array multidimensional simulando um banco de dados de vendas
        $vendas = [
            ["id" => 101, "valor" => 250.00, "status" => "pago"],
            ["id" => 102, "valor" => 400.00, "status" => "pago"],
            ["id" => 103, "valor" => 600.00, "status" => "pendente"],
            ["id" => 104, "valor" => 150.00, "status" => "pago"]
        ];

        $faturamentoTotal = 0;
        $comissaoTotal = 0;

        $output = "=== RESUMO DE VENDAS ===\n";

        foreach ($vendas as $venda) {
            // Valida se a venda foi paga
            if ($venda["status"] === "pago") {
                $faturamentoTotal += $venda["valor"];
                $comissao = calcularComissao($venda["valor"]);
                $comissaoTotal += $comissao;
                
                $output .= "Venda #" . $venda["id"] . " - R$ " . $venda["valor"] . " (Comissão: R$ " . $comissao . ")\n";
            } else {
                $output .= "Venda #" . $venda["id"] . " - AGUARDANDO PAGAMENTO (Ignorada no faturamento)\n";
            }
        }

        $output .= "------------------------\n";
        $output .= "Faturamento Total: R$ $faturamentoTotal\n";
        $output .= "Comissões a Pagar: R$ $comissaoTotal\n";
        $output .= "========================\n";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
