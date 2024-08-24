<?php

require_once './vendor/autoload.php';

use Gasolina\Locomocao;

$message = null;
$error = null;

if($_POST)
{
    $distanciaCasaTrabalhoKm = (float) $_POST['distanciaCasaTrabalhoKm'];
    $valorLitroGasolina = (float) $_POST['valorLitroGasolina'];
    $kmPercorridoLitroGasolina = (float) $_POST['kmPercorridoLitroGasolina'];
    $diasTrabalhados = (float) $_POST['diasTrabalhados'] ?? null;
    $taxaErro = (float) $_POST['taxaErro'] ?? null;

    $locomocao = new Locomocao(
        $distanciaCasaTrabalhoKm,
        $valorLitroGasolina,
        $kmPercorridoLitroGasolina,
        $diasTrabalhados,
        $taxaErro,
    );

    $message = $locomocao->getTextoTotalFormatado();
}
else
{
    $error = "Ops, Algum problema ocorreu!";
}

?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gasto com Gasolina</title>
    <style>
        .box{
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin: 10px 2px;
        }
        .message{
            border: 1px solid darkblue;
            border-radius: 9px;
            padding: 12px;
            background-color: dodgerblue;
            color: darkblue;
            font-weight: bold;
        }
        .error{
            border: 1px solid darkred;
            background-color: palevioletred;
            color: darkred;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Calculadora de gasto com gasolina</h1>
<div class="message <?= $error ? 'error' : '' ?>">
    <?= $message ?: $error ?>
</div>
<form method="post">
    <div class="box">
        <div>
            <label for="distanciaCasaTrabalhoKm">Distância Casa/Trabalho:</label>
            <input type="number" step="any" name="distanciaCasaTrabalhoKm" id="distanciaCasaTrabalhoKm" autofocus required>
        </div>
        <div>
            <label for="valorLitroGasolina">Valor do litro da gasolina:</label>
            <input type="number" step="any" name="valorLitroGasolina" id="valorLitroGasolina" required>
        </div>
        <div>
            <label for="kmPercorridoLitroGasolina">Eficiência do Carro (faz quantos km com 1 litro):</label>
            <input type="number" step="any" name="kmPercorridoLitroGasolina" id="kmPercorridoLitroGasolina" required>
        </div>
        <div>
            <label for="diasTrabalhados">Total de dias trabalhados:</label>
            <input type="number" step="any" name="diasTrabalhados" id="diasTrabalhados">
        </div>
        <div>
            <label for="taxaErro">Taxa de erro:</label>
            <input type="number" step="any" name="taxaErro" id="taxaErro" placeholder="ex. 1.1 = 10%">
        </div>
        <div>
            <input type="submit" value="Calcular">
        </div>
    </div>
</form>
</body>
</html>

