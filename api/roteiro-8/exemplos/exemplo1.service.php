<?php

class Exemplo1Service
{
    public function executar(): array
    {
        $_GET['busca'] = "Desenvolvimento Web";
        $_POST['usuario'] = "aluno_unimetrocamp";
        $_POST['senha'] = "senhaSegura123";
        
        // Identificação do método HTTP da requisição
        $metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        $output = "Método da requisição: $metodo\n";
        
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
