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
        $this->komik = new KomikModel();
        $this->validation = \Config\Services::validation();

        $this->data = [
            'title' => 'Komik Gratis'
        ];
    }

    public function index()
    {
        $data = [
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
            'komik' => $this->komik->getKomik($slug),
        ];

        if (empty($data['komik']))
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');

        return view('komik/detail', array_merge($data, $this->data));
    }

    public function create()
    {
        return view('komik/create', $this->data);
    }

    public function save()
    {
        $data = [];
        if (!$this->validate([
            "judul" => [
                "rules" => 'required|is_unique[komik.judul]',
                "errors" => [
                    "required" => '{field} harus diisi.',
                    "is_unique" => '{field} komik sudah ada.'
                ],
            ],
            "penerbit" => 'required',
            "penulis" => 'required',
            "sampul" => 'required'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
        } else {
            $data = $this->request->getGetPost();
            $data['slug'] = url_title($data['judul'], '-', true);
            if ($this->komik->save($data))
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('komik'));
        }
    }

    public function delete($id)
    {
        if ($this->komik->delete($id)) {
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url('komik'));
        }
    }
}
