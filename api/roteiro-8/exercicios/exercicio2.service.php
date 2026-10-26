<?php
// Exercício 2. 
// Formulário de Pesquisa de Satisfação com Múltiplas Seleções:

// Escreva um script em PHP que processe os dados de uma pesquisa de satisfação. O script deve receber o nome do cliente, uma nota de 1 a 5 (validada com `FILTER_VALIDATE_INT`) e um vetor contendo os serviços avaliados (ex: `["Atendimento", "Infraestrutura", "Material"]`). Utilize um laço `foreach` para exibir todos os itens selecionados e informe o status do atendimento.

namespace Roteiro8\Exercicios;

class Exercicio2Service
{
    public function executar(): array
    {
        $output = 'Ainda não foi feito.';

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
