<?php function somaPositiva($a, $b) {
    $soma = $a + $b;
    if ($soma < 0) {
        return 0;
    } else {
        return $soma;
    }
}

// Exemplo de uso da função
$valor1 = 5;
$valor2 = -10;
$resultado = somaPositiva($valor1, $valor2);
echo "A soma é: " . $resultado;
?>