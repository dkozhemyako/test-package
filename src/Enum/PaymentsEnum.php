<?php

namespace dvk\test_package\Enum;
enum PaymentsEnum: int
{
    case STRIPE = 2;
    case PAYPAL = 1;
    case LIQPAY = 3;

}
