<?php

namespace App\Controllers;

class Komik extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar komik'
        ];

        $data['komik'] = [
            [
                'sampul' => 'assets/images/naruto_episode_1.jpg',
                'judul' => 'Naruto Shippuden Episode 1',
                'aksi' => '<a href="" class="btn btn-sm btn-success">Order</a>'
            ],
            [
                'sampul' => 'assets/images/naruto_episode_2.jpg',
                'judul' => 'Naruto Shippuden Episode 2',
                'aksi' => '<a href="" class="btn btn-sm btn-success">Order</a>'
            ],
        ];

        return view('Komik/index', $data);
    }
}
