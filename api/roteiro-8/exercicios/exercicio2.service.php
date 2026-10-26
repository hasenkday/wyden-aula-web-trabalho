<?php
// Exercício 2. 
// Formulário de Pesquisa de Satisfação com Múltiplas Seleções:

// Escreva um script em PHP que processe os dados de uma pesquisa de satisfação. 
// O script deve receber o nome do cliente, uma nota de 1 a 5 (validada com `FILTER_VALIDATE_INT`) 
// e um vetor contendo os serviços avaliados (ex: `["Atendimento", "Infraestrutura", "Material"]`). 

// Utilize um laço `foreach` para exibir todos os itens selecionados 
// e informe o status do atendimento.

namespace Roteiro8\Exercicios;

class Exercicio2Service
{
    public function executar(): array
    {
        // Dados simulados da pesquisa
        $nome = "Fulano";
        $nota = "4";
        $servicos = ["Atendimento", "Infraestrutura", "Material"];

        $output = "=== PESQUISA DE SATISFAÇÃO ===\n";

        // Valida a nota
        $notaValidada = filter_var($nota, FILTER_VALIDATE_INT);

        if ($nome === "" || $notaValidada === false || $notaValidada < 1 || $notaValidada > 5) {
            $output .= "Dados inválidos.\n";
        } else {
            $output .= "Cliente: {$nome}\n";
            $output .= "Nota: {$notaValidada}/5\n";
            $output .= "Serviços avaliados:\n";

            foreach ($servicos as $servico) {
                $output .= "- {$servico}\n";
            }

            // Informa o status do atendimento
            if ($notaValidada >= 4) {
                $status = "Satisfatório";
            } elseif ($notaValidada === 3) {
                $status = "Regular";
            } else {
                $status = "Insatisfatório";
            }

            $output .= "Status do atendimento: {$status}\n";
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
