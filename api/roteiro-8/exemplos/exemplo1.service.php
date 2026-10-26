<?php
// ETAPA 1: VARIÁVEIS SUPERGLOBAIS E MÉTODOS DE REQUISIÇÃO (GET E POST)

// * Variáveis Superglobais: Vetores nativos e pré-definidos do PHP acessíveis em qualquer escopo do código, como `$_GET`, `$_POST`, `$_SERVER` e `$_REQUEST`.
// * Método GET: Envia parâmetros anexados à URL do navegador (query string). Indicado para buscas, filtros de pesquisa e navegação sem dados sensíveis.
// * Método POST: Envia dados de forma oculta no corpo da requisição HTTP. Indicado para envio de dados sensíveis, cadastros, formulários extensos e logins.
// * `$_SERVER['REQUEST_METHOD']`: Identifica qual método HTTP foi utilizado para acionar o script (ex: `"GET"` ou `"POST"`).

namespace Roteiro8\Exemplos;

class Exemplo1Service
{
    public function executar(): array
    {
        $_GET['busca'] = "Desenvolvimento Web";
        $_POST['usuario'] = "aluno_unimetrocamp";
        $_POST['senha'] = "senhaSegura123";
        
        // Identificação do método HTTP da requisição
        $metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        $output = "Método da requisição: $metodo \n\n";
        
        // Captura de parâmetros via GET
        if (isset($_GET['busca'])) {
            $output .= "Termo pesquisado via GET: " . $_GET['busca'] . "\n\n";
        }
        
        // Captura de parâmetros via POST
        if (isset($_POST['usuario'])) {
            $output .= "Usuário recebido via POST: " . $_POST['usuario'] . "\n\n";
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
