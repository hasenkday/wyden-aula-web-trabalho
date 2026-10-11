<?php
// 1. Calculadora de IMC:

// Crie uma função em PHP chamada calcularIMC($peso,$altura) 
//   que calcule o IMC (fórmula: peso / (altura * altura)) 
//   e retorne a classificação utilizando a estrutura if/elseif/else 
//   (Abaixo do peso, Peso normal, Sobrepeso, Obesidade).

class Exercicio1Service
{
    function CalcularIMC(float $peso, float $altura) {
        $imc = $peso / ($altura * $altura);
        $imc = round($imc, 1);
        $baseMsg = "Seu IMC é $imc (kg/m²) \n";

        if ($imc < 18.5 && $imc > 0){
            return $baseMsg . 'Status: Abaixo do peso / Magreza	Baixo (riscos de desnutrição).';
        } else if ($imc > 18.5 && $imc <= 24.9) {
            return $baseMsg . 'Peso: Saudável / Normal.';    
        } else if ($imc > 25.0 && $imc <= 29.9) {
            return $baseMsg . 'Sobrepeso / Aumentado.';    
        } else if ($imc > 30.0 && $imc <= 34.9) {
            return $baseMsg . 'Obesidade Grau I	Moderado.';
        } else if ($imc > 35.0 && $imc <= 39.9) {
            return $baseMsg . 'Obesidade Grau II	Alto.';
        } else if ($imc >= 40.0) {
            return $baseMsg . 'Obesidade Grau III (Mórbida)	Muito Alto.';
        } else {
            return 'Peso ou altura inválidos';
        }  
    }

    public function executar(): array
    {
        $peso = 49.7;
        $altura = 1.63;
        
        $output = $this->CalcularIMC($peso, $altura);

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
