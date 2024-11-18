<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komik;
    protected $data;
    protected $validation;

    public function __construct()
    {
        session();
        $this->komik = new KomikModel();
        $this->validation = \Config\Services::validation();

        $this->data = [
            'title' => 'Komik Gratis'
        ];
    }

    public function index()
    {
        $data = [
            'method' => 'index',
            'komik' => $this->komik->getKomik(),
            'ColumnName' => [
                'id',
                'sampul',
                'judul'
            ]
        ];

        return view('Komik/index', array_merge($data, $this->data));
    }

    public function details($slug)
    {
        $data = [
            'method' => 'detail',
            'komik' => $this->komik->getKomik($slug),
        ];

        if (empty($data['komik']))
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');

        return view('komik/detail', array_merge($data, $this->data));
    }

    public function create()
    {
        $data = [
            'method' => 'create',
        ];

        return view('komik/create', array_merge($data, $this->data));
    }

    public function save()
    {
        $data = [];
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'judul' => 'required|is_unique[komik.judul]',
            'penulis' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('validation', $validation->listErrors());
        }
    }
}
