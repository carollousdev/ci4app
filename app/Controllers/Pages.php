<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view('Layout/Header');
        echo view('Pages/Index');
        echo view('Layout/Footer');
    }

    public function About()
    {
        echo view('Layout/Header');
        echo view('Pages/About');
        echo view('Layout/Footer');
    }
}
