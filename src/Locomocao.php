<?php
declare(strict_types=1);

namespace Gasolina;

readonly class Locomocao
{
    /**
     * @param float $distanciaCasaTrabalhoKm
     * @param float $valorLitroGasolina
     * @param float $kmPercorridoLitroGasolina
     * @param int $diasTrabalhados
     * @param float $taxaErro
     */
    public function __construct(private float $distanciaCasaTrabalhoKm,
                                private float $valorLitroGasolina,
                                private float $kmPercorridoLitroGasolina,
                                private int   $diasTrabalhados = 22,
                                private float $taxaErro = 1.1)
    {
    }

    public function getValorGastoDiario(): float
    {
        return ($this->distanciaCasaTrabalhoKm * 2 * $this->valorLitroGasolina) / $this->kmPercorridoLitroGasolina;
    }

    public function getValorGastoTotal(): float
    {
        return $this->getValorGastoDiario() * $this->diasTrabalhados * $this->taxaErro;
    }

    public function getTextoTotalFormatado(): string
    {
        $valorFormatado = number_format($this->getValorGastoTotal(), 2);
        return "Gasto total por $this->diasTrabalhados dias trabalhados: R\$$valorFormatado reais aproximadamente.";
    }
}