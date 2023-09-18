<?php

namespace PayPal;

use MakePaymentResultDTO;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class MakePaymentService
{

    /**
     * @throws \Throwable
     */
    public function handle(PayPalClient $payPalClient, string $paymentId): MakePaymentResultDTO
    {
        $response = $payPalClient->capturePaymentOrder($paymentId);
        if (isset($response['error'])) {
            return $response['error'];
        }

        return new MakePaymentResultDTO
        (
            $response['status'],
            $response['purchase_units']['0']['payments']['captures']['0']['id'],
            $response['id'],
            $response['purchase_units']['0']['shipping']['name']['full_name'],
            $response['payer']['email_address'],
            $response['purchase_units']['0']['payments']['captures']['0']['amount']['value'],
            $response['purchase_units']['0']['payments']['captures']['0']['amount']['currency_code'],
        );
    }

}