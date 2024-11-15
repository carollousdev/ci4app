<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komik;

    public function __construct()
    {
        $this->komik = new KomikModel();
    }

    public function index()
    {

        $data = [
            'method' => 'index',
            'title' => 'Daftar Komik',
            'komik' => $this->komik->getKomik(),
            'ColumnName' => [
                'id',
                'sampul',
                'judul'
            ]
        ];

        return view('Komik/index', $data);
    }

    public function details($slug)
    {
        $data = [
            'method' => 'detail',
            'title' => 'Daftar komik',
            'komik' => $this->komik->getKomik($slug),
        ];

        return view('komik/detail', $data);
    }
}
