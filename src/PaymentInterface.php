<?php

interface PaymentInterface

{
    public function makePayment(string $paymentId): MakePaymentResultDTO;

    public function createPayment(MakePaymentDTO $makePaymentDTO): string;
}