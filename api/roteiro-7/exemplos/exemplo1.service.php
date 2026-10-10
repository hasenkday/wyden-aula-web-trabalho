<?php
// ETAPA 1: VARIÁVEIS, TIPOS DE DADOS E OPERADORES

// Conceito:

// * Variáveis: Sempre iniciadas com o símbolo cifrão ($).
// * Tipos de dados: String (texto), Integer (inteiro), Float (decimal), Boolean (true/false).
// * Operadores Aritméticos: + (soma), - (subtração), * (multiplicação), / (divisão), % (módulo/resto), (exponenciação).
// * Operadores Relacionais: == (igual), === (idêntico em valor e tipo), != (diferente), > (maior), < (menor), >= (maior ou igual), <= (menor ou igual).
// * Operadores Lógicos: && ou AND (E), || ou OR (OU), ! (NÃO / Negação).



class Exemplo1Service
{
    public function executar(): array
    {
        // Variáveis e Tipos de Dados
        $nomeCurso = "PHP para Iniciantes"; // String
        $quantidadeAlunos = 45; // Integer
        $precoCurso = 99.90; // Float
        $cursoAtivo = true; // Boolean

        // Operadores Aritméticos
        $soma = 10 + 5;
        $resto = 10 % 3;

        // Operadores Relacionais e Lógicos (variáveis não utilizadas)
        $maiorIdade = (18 >= 18);
        $acessoLiberado = ($cursoAtivo && $quantidadeAlunos > 0);

        $output = "Curso: $nomeCurso (Ativo? $cursoAtivo)\n";
        $output .= "Soma: $soma | Resto da Divisão: $resto\n";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
