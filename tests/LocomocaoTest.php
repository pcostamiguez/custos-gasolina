<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Gasolina\Locomocao;

class LocomocaoTest extends TestCase
{
    public function testGetValorGastoDiario()
    {
        $locomocao = new Locomocao(10, 5.00, 10);
        $valorDiario = $locomocao->getValorGastoDiario();
        $this->assertEquals(10.0, $valorDiario);
    }

    public function testGetValorGastoTotal()
    {
        $locomocao = new Locomocao(10, 5.00, 10, 22, 1.1);
        $valorTotal = $locomocao->getValorGastoTotal();
        $this->assertEqualsWithDelta(242.0, $valorTotal, 0.0001);
    }

    public function testGetTextoTotalFormatado()
    {
        $locomocao = new Locomocao(10, 5.00, 10, 22, 1.1);
        $textoFormatado = $locomocao->getTextoTotalFormatado();
        $this->assertEquals('Gasto total por 22 dias trabalhados: R$242.00 reais aproximadamente.', $textoFormatado);
    }
}
