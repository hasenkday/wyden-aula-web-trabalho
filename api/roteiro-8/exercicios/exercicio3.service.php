<?php
// Exercício 3. 
// Validador de E-mails com Domínio Institucional:

// Crie um algoritmo em PHP que receba uma lista (array) de e-mails
// digitados em um formulário. O programa deve validar o formato 
// de cada endereço com `filter_var()` e verificar se o e-mail 
// possui o domínio institucional `"@unimetrocamp.edu.br"`. 

// O script deve listar separadamente quais e-mails foram aceitos 
// e quais foram rejeitados.

namespace Roteiro8\Exercicios;

class Exercicio3Service
{
    public function executar(): array
    {
        // Simulando os e-mails enviados por um formulário
        $emails = [
            "fulano@unimetrocamp.edu.br",
            "cicrano@gmail.com",
            "email-invalido",
            "alguem@unimetrocamp.edu.br",
            "teste@teste.com"
        ];

        $aceitos = [];
        $rejeitados = [];

        foreach ($emails as $email) {
            if ( filter_var($email, FILTER_VALIDATE_EMAIL) && str_ends_with($email, "@unimetrocamp.edu.br")) {
                $aceitos[] = $email;
            } else {
                $rejeitados[] = $email;
            }
        }

        $output = "=== VALIDADOR DE E-MAILS WYDEN ===\n";

        $output .= "\nE-mails aceitos:\n";
        foreach ($aceitos as $email) {
            $output .= " - " . $email . "\n";
        }

        $output .= "\nE-mails rejeitados:\n";
        foreach ($rejeitados as $email) {
            $output .= " - " . $email . "\n";
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
