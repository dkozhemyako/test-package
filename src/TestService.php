<?php

class TestService
{
    public function hello (string $name, string $msg): string
    {
        return 'Hello ' . $name . ', ' . $msg;
    }
}