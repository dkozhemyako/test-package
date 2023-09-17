<?php

namespace PayPal\Handlers;

use DTO\PaymentDataDTO;
use MakePaymentDTO;
use MakePaymentResultDTO;
use PaymentInterface;
use PayPal\CreatePaymentService;
use PayPal\MakePaymentService;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalHandler implements PaymentInterface
{

    public function __construct(
        protected PayPalClient $payPalClient,
        protected PaymentDataDTO $paymentDataDTO,
    ) {
        $this->payPalClient->setApiCredentials([
            'mode' => $this->paymentDataDTO->getMode(),
            'sandbox' => [
                'client_id' => $this->paymentDataDTO->getClientId(),
                'client_secret' => $this->paymentDataDTO->getClientSecret(),
                'app_id' => $this->paymentDataDTO->getAppId(),
            ],
            'live' => [
                'client_id' => $this->paymentDataDTO->getClientId(),
                'client_secret' => $this->paymentDataDTO->getClientSecret(),
                'app_id' => $this->paymentDataDTO->getAppId(),
            ],
            'payment_action' => 'Sale',
            'currency' => 'USD',
            'notify_url' => '',
            'locale' => 'en_US',
            'validate_ssl' => true,
        ]);
        $this->payPalClient->getAccessToken();
    }

    public function makePayment(string $paymentId): MakePaymentResultDTO
    {
        return (new MakePaymentService())->handle($this->payPalClient, $paymentId);
    }


    public function createPayment(MakePaymentDTO $makePaymentDTO): string
    {
        return (new CreatePaymentService())->handle($this->payPalClient, $makePaymentDTO);
    }
}