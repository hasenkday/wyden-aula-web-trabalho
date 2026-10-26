<?php
// ETAPA 5: PROJETO INTEGRADOR (SISTEMA COMPLETO DE PROCESSAMENTO DE FORMULÁRIO E CADASTRO)

// Script consolidado combinando recepção de dados de formulário via `$_POST`, sanitização contra ataques XSS, validação de e-mail e idade, processamento de itens de seleção múltipla e exibição de feedback formatado.

namespace Roteiro8\Exemplos;

class Exemplo5Service
{
    // Projeto Integrador: Sistema de Processamento de Inscrição Acadêmica
    function processarInscricao($dados) {
        $erros = [];
        $sucesso = [];

        // Sanitização e Validação do Nome
        $nome = htmlspecialchars(trim($dados['nome'] ?? ''));
        if (empty($nome)) {
            $erros[] = "O campo Nome é obrigatório.";
        }

        // Sanitização e Validação do E-mail
        $email = trim($dados['email'] ?? '');
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = "Forneça um endereço de e-mail válido.";
        }

        // Validação da Idade
        $idade = filter_var($dados['idade'] ?? '', FILTER_VALIDATE_INT);
        if ($idade === false || $idade < 16) {
            $erros[] = "A idade mínima para inscrição é 16 anos.";
        }

        // Processamento de Áreas de Interesse (Array)
        $areas = $dados['areas'] ?? [];

        if (empty($erros)) {
            $sucesso['nome'] = $nome;
            $sucesso['email'] = $email;
            $sucesso['idade'] = $idade;
            $sucesso['areas'] = is_array($areas) ? array_map('htmlspecialchars', $areas) : [];
            return ["status" => true, "dados" => $sucesso];
        } else {
            return ["status" => false, "erros" => $erros];
        }
    }

    public function executar(): array
    {
        // Simulando a submissão de um formulário completo via $_POST
        $_POST = [
            'nome' => " Maria Clara Santos ",
            'email' => "maria.santos@aluno.unimetrocamp.edu.br",
            'idade' => "21",
            'areas' => ["Desenvolvimento Web", "Banco de Dados", "Engenharia de Software"]
        ];

        $output = "=== SISTEMA DE INSCRIÇÃO ACADÊMICA WYDEN ===\n";

        $resultado = $this->processarInscricao($_POST);

        if ($resultado['status']) {
            $dadosForm = $resultado['dados'];
            $output .= "[SUCESSO] Inscrição realizada com sucesso!\n";
            $output .= "----------------------------------------\n";
            $output .= "Aluno(a): " . $dadosForm['nome'] . "\n";
            $output .= "E-mail: " . $dadosForm['email'] . "\n";
            $output .= "Idade: " . $dadosForm['idade'] . " anos\n";
            $output .= "Áreas de Interesse:\n";
            foreach ($dadosForm['areas'] as $area) {
                $output .= "  * " . $area . "\n";
            }
            $output .= "----------------------------------------\n";
        } else {
            $output .= "[ERRO] Falha no processamento do formulário:\n";
            foreach ($resultado['erros'] as $erro) {
                $output .= " - " . $erro . "\n";
            }
        }
        $output .= "========================================\n";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
