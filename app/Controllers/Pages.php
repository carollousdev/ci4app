<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'CodeIgniter 4',
            'array' => ['John', 'Smith', 'Bryan', 'Lukas']
        ];
    }

    public function index()
    {
        $this->data['method'] = 'index';
        return view('Pages/Index', $this->data);
    }

    public function About()
    {
        $this->data['method'] = 'about';
        return view('Pages/About', $this->data);
    }
}
