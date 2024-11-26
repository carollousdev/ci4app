<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\Files\File;

class Komik extends BaseController
{
    protected $komik;
    protected $data;
    protected $validation;
    protected $validations;

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
            'komik' => $this->komik->getKomik(['slug' => $slug]),
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
        // Define validation rules
        $this->validations['rules'] = [
            'judul' => 'required|is_unique[komik.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => 'mime_in[sampul, image/jpg,image/jpeg,image/gif,image/webp]'
        ];

        if (!$this->validate($this->validations['rules'])) {
            return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
        } else {

            $img = $this->request->getFile('sampul');
            $imgName = 'default.jpg';

            if (strlen($img->getName()) > 1) {
                $imgName = $img->getName();
                if ($img->isValid() && !$img->hasMoved()) {
                    $uploadPath = FCPATH . 'uploads/images/';
                    file_exists($uploadPath . $img->getName()) ?
                        $img->move($uploadPath . 'temp/', $img->getRandomName()) :
                        $img->move($uploadPath, $img->getName());
                }
            }

            $data = array_merge(
                [
                    'sampul' => $imgName,
                    'slug' => url_title($this->request->getVar('judul'), '-', true)
                ],
                $this->request->getVar()
            );

            if ($this->komik->save($data)) {
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            }

            return redirect()->to('komik');
        }
    }


    public function edit($slug)
    {
        $data['komik'] = $this->komik->getKomik(['slug' => $slug]);

        if (empty($data['komik']))
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');

        return view('komik/edit', array_merge($data, $this->data));
    }

    public function update()
    {
        $img = $this->request->getFile('sampul');
        $uploadPath = FCPATH . 'uploads/images/';

        // Define validation rules
        $this->validations['rules'] = [
            'judul' => $this->komik->getKomik(['id' => $this->request->getVar('id')])['judul'] == $this->request->getVar('judul') ? 'required' : 'required|is_unique[komik.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => 'mime_in[sampul, image/jpg,image/jpeg,image/gif,image/webp]',
        ];

        // Define validation messages
        $this->validations['messages'] = [
            'judul' => [
                'required' => 'Judul harus diisi.',
                'is_unique' => 'Judul sudah ada.'
            ],
            'penulis' => [
                'required' => 'Penulis harus diisi.'
            ],
            'penerbit' => [
                'required' => 'Penerbit harus diisi.'
            ],
            'sampul' => [
                'mime_in' => 'Sampul tidak sesuai format.'
            ],
        ];

        // Validate input
        if (!$this->Validate($this->validations['rules'], $this->validations['messages'])) {
            // If validation fails, redirect back with input and errors
            return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
        }

        $sampul = $this->komik->getKomik(['id' => $this->request->getVar('id')])['sampul'];

        if (strlen($img->getName()) > 1) {
            $sampul = $img->getName();
            if ($img->isValid() && !$img->hasMoved()) {
                file_exists($uploadPath . $img->getName()) ?
                    $img->move($uploadPath . 'temp/', $img->getRandomName()) :
                    $img->move($uploadPath, $img->getName());
            }
        }

        // Prepare data for updating
        $data = array_merge(['slug' => url_title($this->request->getVar('judul'), '-', true), 'sampul' => $sampul], $this->request->getVar());

        // Save the updated data
        if ($this->komik->save($data)) {
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
        }

        // Redirect back to komik list
        return redirect()->to(base_url('komik'));
    }

    public function delete($id)
    {
        if ($this->komik->delete($id)) {
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url('komik'));
        }
    }
}
