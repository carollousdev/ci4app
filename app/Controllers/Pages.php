<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public $data;

    public function __construct()
    {
        $this->data = [
            'title' => 'CodeIgniter 4',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. ABC No. 123',
                    'kota' => 'Medan',
                    'kode' => '20255'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Merdeka No. 45A',
                    'kota' => 'Jakarta',
                    'kode' => '12345'
                ],
            ]
        ];
    }

    public function index()
    {
        $this->data['method'] = 'home';
        return view('Pages/Index', $this->data);
    }

    public function About()
    {
        $this->data['method'] = 'about';
        return view('Pages/About', $this->data);
    }

    public function Contact()
    {
        $this->data['method'] = 'contact';
        return view('Pages/Contact', $this->data);
    }
}
