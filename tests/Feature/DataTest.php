<?php

namespace Tests;

use App\Models\Data;

class DataTest extends \PHPUnit\Framework\TestCase
{
    public function testCurrencyConvertUAH()
    {
        $data = new Data();
        $currencyId = Data::UAH_ID;
        $amount = 100;
        $type = 'save'; // Doesn't matter for UAH

        $convertedAmount = $data->currencyConvert($currencyId, $amount, $type);

        $this->assertEquals($amount, $convertedAmount);
    }

    public function testCurrencyConvertUSDToSave()
    {
        $data = new Data();
        $currencyId = Data::USD_ID;
        $amount = 100;
        $type = 'save';

        $convertedAmount = $data->currencyConvert($currencyId, $amount, $type);

        $expectedAmount = Data::USD_TO_UAH_VALUE * $amount;
        $this->assertEquals($expectedAmount, $convertedAmount);
    }

    public function testCurrencyConvertUSDShow()
    {
        $data = new Data();
        $currencyId = Data::USD_ID;
        $amount = 100;
        $type = 'show';

        $convertedAmount = $data->currencyConvert($currencyId, $amount, $type);

        $expectedAmount = $amount / Data::USD_TO_UAH_VALUE;
        $this->assertEquals($expectedAmount, $convertedAmount);
    }

    public function testCurrencyConvertEUROToSave()
    {
        $data = new Data();
        $currencyId = Data::EURO_ID;
        $amount = 100;
        $type = 'save';

        $convertedAmount = $data->currencyConvert($currencyId, $amount, $type);

        $expectedAmount = Data::EURO_TO_UAH_VALUE * $amount;
        $this->assertEquals($expectedAmount, $convertedAmount);
    }

    public function testCurrencyConvertEUROShow()
    {
        $data = new Data();
        $currencyId = Data::EURO_ID;
        $amount = 100;
        $type = 'show';

        $convertedAmount = $data->currencyConvert($currencyId, $amount, $type);

        $expectedAmount = $amount / Data::EURO_TO_UAH_VALUE;
        $this->assertEquals($expectedAmount, $convertedAmount);
    }
}
