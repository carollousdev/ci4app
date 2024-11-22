<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table            = 'komik';
    protected $useTimestamps    = true;

    protected $allowedFields = ['judul', 'sampul', 'slug', 'penulis', 'penerbit'];

    public function getKomik($parameter1 = [])
    {
        if (!$parameter1)
            return $this->findAll();
        else
            return $this->where($parameter1)->first();
    }
}
