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
            'title' => 'Daftar Komik',
            'komik' => $this->komik->findAll(),
            'ColumnName' => [
                'id',
                'sampul',
                'judul'
            ]
        ];

        return view('Komik/index', $data);
    }
}
