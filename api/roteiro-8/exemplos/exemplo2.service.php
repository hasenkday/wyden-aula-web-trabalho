<?php
// ETAPA 2: VALIDAÇÃO E SANITIZAÇÃO DE DADOS DE FORMULÁRIO

// * `empty()` e `isset()`: `isset()` verifica se a variável foi declarada; `empty()` verifica se o valor está vazio ou zerado.
// * Sanitização: Uso de `htmlspecialchars()` para converter caracteres especiais em entidades HTML, prevenindo ataques do tipo Cross-Site Scripting (XSS).
// * Validação com `filter_var()`: Função nativa do PHP para filtrar e validar tipos de dados específicos, como e-mails (`FILTER_VALIDATE_EMAIL`), inteiros (`FILTER_VALIDATE_INT`) e decimais (`FILTER_VALIDATE_FLOAT`).

namespace Roteiro8\Exemplos;

class Exemplo2Service
{
    public function executar(): array
    {
        // Simulação de entradas enviadas por um formulário web
        $nomeEntrada = "<script>alert('hack');</script> Fulano Cicrano";
        $emailEntrada = "fulano@exemplo.com";
        $idadeEntrada = "22";

        $output = '';

        // 1. Sanitização para prevenção de XSS
        $nomeSanitizado = htmlspecialchars(trim($nomeEntrada));

        // 2. Validação de E-mail com filter_var
        if (filter_var($emailEntrada, FILTER_VALIDATE_EMAIL)) {
            $emailValidado = $emailEntrada;
        } else {
            $emailValidado = null;
            $output .= "Aviso: E-mail fornecido é inválido!\n";
        }

        // 3. Validação de Idade como Número Inteiro
        $idadeValidada = filter_var($idadeEntrada, FILTER_VALIDATE_INT);

        $output .= "Nome Sanitizado: $nomeSanitizado\n";
        $output .= "E-mail Validado: " . ($emailValidado ?? "E-mail Inválido") . "\n";
        $output .= "Idade Validada: " . ($idadeValidada !== false ? $idadeValidada . " anos" : "Idade Inválida") . "\n";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
