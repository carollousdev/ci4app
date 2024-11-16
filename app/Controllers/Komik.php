<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komik;
    protected $data;
    protected $errors;

    public function __construct()
    {
        $this->komik = new KomikModel();
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
            'method' => 'create'
        ];

        return view('komik/create', array_merge($data, $this->data));
    }

    public function save()
    {
        $data = [];
        foreach ($this->komik->allowedFields as $key => $value) {
            if (!empty($this->request->getVar($value))) {
                $data[$value] = $this->request->getVar($value);
            } else if ($value !== 'slug') $this->errors[] = $value;
        }

        if (!empty($data['judul']))
            $data['slug'] = url_title($data['judul'], '-', true);

        if (empty($this->errors)) {
            if ($this->komik->save($data)) {
                session()->setFlashdata('pesan', "Data {$data['judul']} berhasil ditambahkan");
                return redirect()->to('/komik');
            }
        } else return redirect()->to('/komik/create');
    }
}
