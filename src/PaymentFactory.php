<?php

use DTO\PaymentDataDTO;
use PayPal\Handlers\PaypalHandler;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentFactory
{

    public function getInstance(PaymentsEnum $paymentsEnum, $config): PaypalHandler
    {
        return match ($paymentsEnum) {
            PaymentsEnum::PAYPAL => new PaypalHandler(
                new PayPalClient(),
                new PaymentDataDTO(
                    $config['paypal']['client_id'],
                    $config['paypal']['client_secret'],
                    $config['paypal']['app_id'],
                    $config['paypal']['mode'],
                )
            ),
        };
    }
}