<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index(): string
    {
        return "success";
    }

    public function about(string $name = null, $age = null): mixed
    {
        return !$name ? "Please input your name." : "Welcome, $name Umur Anda sekarang $age";
    }
}
