<?php

namespace App\Controllers;

use \App\Models\PersonModel;

class Pages extends BaseController
{
    public $data;
    public $person;

    public function __construct()
    {
        $this->data = [
            'title' => 'CodeIgniter 4',
            'person' => new PersonModel()
        ];
    }

    public function index()
    {
        $this->data['method'] = 'home';
        return view('Pages/Index', $this->data);
    }

    public function About()
    {
        $this->data['method'] = 'about';
        return view('Pages/About', $this->data);
    }

    public function Contact()
    {
        $this->data['method'] = 'contact';
        $model = model(PersonModel::class);

        $data = [
            'persons' => $model->paginate(10),
            'pager' => $model->pager,
        ];

        return view('Pages/Contact', $data);
    }
}
