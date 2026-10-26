<?php
// Exercício 4. 
// Controle de Sessão com Tempo Limite de Inatividade:

// Crie um script em PHP utilizando `$_SESSION` para simular 
// o controle de tempo de uma sessão de usuário. 

// Salve o nome do usuário e o horário do acesso usando `time()`. 

// Implemente uma verificação que compare o tempo atual com o tempo armazenado: 
// se o intervalo for maior que 30 segundos, destrua a sessão com `session_destroy()` 
// e exiba "Sessão Expirada", caso contrário, exiba "Sessão Ativa".

namespace Roteiro8\Exercicios;

class Exercicio4Service
{
    public function executar(): array
    {
        // Inicia a sessão
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $output = "=== CONTROLE DE SESSÃO ===\n";

        // Verifica o tempo de inatividade
        if (isset($_SESSION['ultimo_acesso'])) {
            $tempoInativo = time() - $_SESSION['ultimo_acesso'];

            if ($tempoInativo > 30) {
                session_unset();
                session_destroy();
                $output .= "Sessão Expirada\n";
            } else {
                $_SESSION['ultimo_acesso'] = time();
                $output .= "Usuário: " . $_SESSION['usuario'] . "\n";
                $output .= "Sessão Ativa\n";
            }
        } else {
            // Cria uma nova sessão
            $_SESSION['usuario'] = "aluno_unimetrocamp";
            $_SESSION['ultimo_acesso'] = time();
            $output .= "Usuário: " . $_SESSION['usuario'] . "\n";
            $output .= "Sessão Ativa\n";
        }
        
        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
