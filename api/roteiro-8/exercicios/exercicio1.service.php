<?php
// Exercício 1. 
// Sistema de Checkout com Validação e Desconto por Cupom:

// Crie uma função em PHP chamada `processarCheckout($dados)` que receba 
// um array contendo os campos `nome`, `valor_compra` e `cupom`. 

// - O código deve sanitizar o nome, 
// - validar se o valor da compra é um número decimal positivo (`FILTER_VALIDATE_FLOAT`) 
// - e, caso o cupom informado seja `"WYDEN10"`, aplicar 10% de desconto no valor final, 
//   exibindo o resumo detalhado da compra.

namespace Roteiro8\Exercicios;

class Exercicio1Service
{
    function processarCheckout(array $dados){
        $erros = [];
        $sucesso = [];

        // Sanitização e Validação do Nome
        $nome = htmlspecialchars(trim($dados['nome'] ?? ''));
        if (empty($nome)) {
            $erros[] = "O campo Nome é obrigatório.";
        }

        // Validação do Valor da Compra
        $valor_validado = filter_var(
            $dados['valor_compra'] ?? '',
            FILTER_VALIDATE_FLOAT
        );

        if ($valor_validado === false || $valor_validado <= 0) {
            $erros[] = "Forneça um valor de compra válido e positivo.";
        }

        // Processamento do Cupom de Desconto
        $cupom = trim($dados['cupom'] ?? '');
        $valor_final = $valor_validado;

        if ($valor_validado !== false && $valor_validado > 0) {
            if ($cupom === "WYDEN10") {
                $valor_final = $valor_validado * 0.90;
            }
        }

        if (empty($erros)) {
            $sucesso['nome'] = $nome;
            $sucesso['valor_compra'] = $valor_validado;
            $sucesso['cupom'] = $cupom;
            $sucesso['desconto'] = $cupom === "WYDEN10" ? $valor_validado * 0.10 : 0;
            $sucesso['valor_final'] = $valor_final;
            return ["status" => true, "dados" => $sucesso];
        } else {
            return ["status" => false, "erros" => $erros];
        }
    }

    public function executar(): array
    {
        // Simulando a submissão de um formulário via $_POST
        $_POST = [
            'nome' => "<script>alert('hack');</script> Fulano Cicrano",
            'valor_compra' => 220.20,
            'cupom' => "WYDEN10",
        ];

        $output = "=== SISTEMA DE CHECKOUT WYDEN ===\n";

        $resultado = $this->processarCheckout($_POST);

        if ($resultado['status']) {
            $dadosForm = $resultado['dados'];

            $output .= "[SUCESSO] Compra processada com sucesso!\n";
            $output .= "----------------------------------------\n";
            $output .= "Cliente: " . $dadosForm['nome'] . "\n";
            $output .= "Valor da compra: R$ " . number_format($dadosForm['valor_compra'], 2, ',', '.') . "\n";
            $output .= "Cupom: " . ($dadosForm['cupom'] ?: "Nenhum") . "\n";
            $output .= "Desconto: R$ " . number_format($dadosForm['desconto'], 2, ',', '.') . "\n";
            $output .= "Valor final: R$ " . number_format($dadosForm['valor_final'], 2, ',', '.') . "\n";
            $output .= "----------------------------------------\n";
        } else {
            $output .= "[ERRO] Falha no processamento do checkout:\n";

            foreach ($resultado['erros'] as $erro) {
                $output .= " - " . $erro . "\n";
            }
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
