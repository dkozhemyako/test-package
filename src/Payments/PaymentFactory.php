<?php

namespace dkv\test_package\Payments;



use dkv\test_package\Enum\PaymentsEnum;
use dkv\test_package\Payments\PayPal\Handlers\PaypalHandler;
use dkv\test_package\Payments\DTO\PaymentDataDTO;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentFactory
{

    /**
     * @throws \Throwable
     */
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