<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Person extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('person');
    }

    public function down()
    {
        $this->forge->dropTable('person');
    }
}
