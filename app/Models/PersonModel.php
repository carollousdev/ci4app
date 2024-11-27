<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table            = 'person';
    protected $useTimestamps    = true;

    protected $allowedFields = ['name', 'alamat'];
}
