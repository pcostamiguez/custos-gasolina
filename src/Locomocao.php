<?php
declare(strict_types=1);

namespace Gasolina;

class Locomocao
{
    private float $distanciaCasaTrabalhoKm;
    private float $valorLitroGasolina;
    private float $kmPercorridoLitroGasolina;
    private int $diasTrabalhados;
    private float $taxaErro;

    /**
     * @param float $distanciaCasaTrabalhoKm
     * @param float $valorLitroGasolina
     * @param float $kmPercorridoLitroGasolina
     * @param int $diasTrabalhados
     * @param float $taxaErro
     */
    public function __construct(float $distanciaCasaTrabalhoKm,
                                float $valorLitroGasolina,
                                float $kmPercorridoLitroGasolina,
                                int $diasTrabalhados = 22,
                                float $taxaErro = 1.1)
    {
        $this->distanciaCasaTrabalhoKm = $distanciaCasaTrabalhoKm;
        $this->valorLitroGasolina = $valorLitroGasolina;
        $this->kmPercorridoLitroGasolina = $kmPercorridoLitroGasolina;
        $this->diasTrabalhados = $diasTrabalhados;
        $this->taxaErro = $taxaErro;
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
        return "Gasto total por {$this->diasTrabalhados} dias trabalhados: R\${$valorFormatado} reais aproximadamente.";
    }
}