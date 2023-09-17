<?php

namespace PayPal;

use CurrencyEnum;
use MakePaymentDTO;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class CreatePaymentService
{

    /**
     * @throws Throwable
     */
    public function handle(PayPalClient $payPal, MakePaymentDTO $makePaymentDTO): string
    {
        $response = $payPal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $this->getCurrency($makePaymentDTO->getCurrency()),
                        "value" => number_format($makePaymentDTO->getAmount(), 2)
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            return $response['id'];
        }
        return '';
    }

    private function getCurrency(CurrencyEnum $currencyEnum): string
    {
        return match ($currencyEnum) {
            CurrencyEnum::USD => 'USD',
            CurrencyEnum::EUR => 'EUR'
        };
    }
}