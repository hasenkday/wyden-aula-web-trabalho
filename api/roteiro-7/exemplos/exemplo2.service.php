<?php
// ETAPA 2: ESTRUTURAS CONDICIONAIS (TOMADA DE DECISÃO)

// Conceito:

// * if / elseif / else: Avalia uma série de condições lógicas em ordem.
// * Operador Ternário: Abreviação para tomadas de decisão simples (condicao ? verdadeiro : falso).
// * switch / case / default: Estrutura para comparar uma mesma variável com múltiplos valores fixos.

class Exemplo2Service
{
    public function executar(): array
    {
        $idade = 20;

        // if / elseif / else
        if ($idade < 18) {
            $output = "Menor de idade.\n";
        } elseif ($idade == 18) {
            $output = "Exatamente 18 anos.\n";
        } else {
            $output = "Maior de idade.\n";
        }

        // Operador Ternário
        $status = ($idade >= 18) ? "Pode dirigir" : "Não pode dirigir";
        $output .= "Status: $status\n";

        // Switch / Case
        $perfil = "admin";
        switch ($perfil) {
            case "admin":
                $output .= "Acesso total liberado.\n";
                break;
            case "usuario":
                $output .= "Acesso restrito.\n";
                break;
            default:
                $output .= "Perfil não encontrado.\n";
                break;
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
