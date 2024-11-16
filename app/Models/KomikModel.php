<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table            = 'komik';
    protected $useTimestamps    = true;

    protected $allowedFields = ['judul', 'sampul', 'slug', 'penulis', 'penerbit'];

    public function getKomik($slug = false)
    {
        if (!$slug)
            return $this->findAll();
        else
            return $this->where(['slug' => $slug])->first();
    }
}
