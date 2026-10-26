<?php
// ETAPA 4: GERENCIAMENTO DE SESSÕES (`$_SESSION`) E COOKIES (`$_COOKIE`)

// * `session_start()`: Função obrigatória que deve ser executada no início do script para criar ou inicializar uma sessão no servidor.
// * Variável Superglobal `$_SESSION`: Vetor associativo no servidor que mantém informações do usuário durante a navegação por múltiplas páginas.
// * `setcookie()` e `$_COOKIE`: Responsáveis por salvar e recuperar pequenos blocos de dados diretamente no navegador do cliente com tempo de expiração configurado.

namespace Roteiro8\Exemplos;

class Exemplo4Service
{
    public function executar(): array
    {
        // Inicialização de sessão
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Armazenando informações na sessão
        $_SESSION['usuario_logado'] = "leonardo.oliveira";
        $_SESSION['perfil'] = "Professor";
        $_SESSION['hora_login'] = date("H:i:s");

        // Criando um Cookie com preferência do usuário (expira em 1 hora)
        setcookie("tema_preferido", "escuro", time() + 3600);

        $output = "=== DADOS DA SESSÃO ATIVA ===\n";
        $output .= "Usuário: " . $_SESSION['usuario_logado'] . "\n";
        $output .= "Perfil: " . $_SESSION['perfil'] . "\n";
        $output .= "Horário do Login: " . $_SESSION['hora_login'] . "\n";

        // Leitura do Cookie gravado
        $tema = $_COOKIE['tema_preferido'] ?? 'claro';
        $output .= "Tema da Interface (Cookie): $tema\n";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
