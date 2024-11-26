<?php

namespace App\Controllers;

class Person extends BaseController
{
    public function index()
    {
        $forge = \Config\Database::forge();
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'King of Town',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['publish', 'pending', 'draft'],
                'default'    => 'pending',
            ],
        ];

        $forge->addField($fields);
        $forge->addKey('id', true);
        if ($forge->createTable('person', true)) {
            echo "Table has created";
        }
    }
}
