<?php
// 4. Sistema de Autenticação com Limite de Tentativas:

// Crie um script utilizando do...while que simule até 
//   3 tentativas de login.
// Se a senha for correta ("12345"), exiba 
//   "Acesso Autorizado" e encerre o laço com o 
//   comando break. Caso atinja 3 tentativas sem 
//   sucesso, exiba "Conta Bloqueada".

namespace Roteiro7\Exercicios;

class Exercicio4Service
{
    private int $tentativas = 0;
    private bool $bloqueada = false;

    function login(string $senha) {
        if ($this->bloqueada) {
            return 'Conta Bloqueada.';
        }   

        do {
            if ($senha === '12345') {
                $this->tentativas = 0;
                return 'Acesso Autorizado.';
            }

            $this->tentativas++;

            if ($this->tentativas >= 3) {
                $this->bloqueada = true;
                return 'Conta Bloqueada.';
            }

            return 'Senha incorreta, tente novamente.';

        } while ($this->tentativas < 3);
    }

    public function executar(): array
    {
        $output = "SIMULAÇÃO 1: Erro e acerto\n";

        $output .= $this->login('abc') . "\n";
        $output .= $this->login('12345') . "\n";

        $output .= "\n---\n\n";

        $output .= "SIMULAÇÃO 2: Três erros e bloqueio\n";

        $output .= $this->login('abc') . "\n";
        $output .= $this->login('errada') . "\n";
        $output .= $this->login('00000') . "\n";
        $output .= $this->login('12345') . "\n";
        $output .= $this->login('00000') . "\n\n";

        $output .= 'Mesmo com acerto, a conta ainda está bloqueada.';

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
