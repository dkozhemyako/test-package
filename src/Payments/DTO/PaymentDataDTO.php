<?php

namespace DTO;

namespace dkv\test_package\Payments\DTO;

class PaymentDataDTO
{
    public function __construct(
        protected string $client_id,
        protected string $client_secret,
        protected string $app_id,
        protected string $mode,
    ) {
    }

    public function getClientId(): string
    {
        return $this->client_id;
    }

    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    public function getAppId(): string
    {
        return $this->app_id;
    }

    public function getMode(): string
    {
        return $this->mode;
    }
}