<?php

namespace dkv\test_package\Payments;

use dkv\test_package\Payments\DTO\MakePaymentDTO;
use dkv\test_package\Payments\DTO\MakePaymentResultDTO;

interface PaymentInterface

{
    public function makePayment(string $paymentId): MakePaymentResultDTO;

    public function createPayment(MakePaymentDTO $makePaymentDTO): string;
}