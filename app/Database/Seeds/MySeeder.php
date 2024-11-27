<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MySeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $dump = [];
        for ($i = 0; $i < 1000; $i++) {
            if ($i == 0) $dump[] = $faker->name();
            if (!in_array($faker->name(), $dump)) {
                $data[$i]['name'] = $faker->name('female');
                $data[$i]['alamat'] = $faker->streetAddress();
            } else $i = $i - 1;
        }

        $this->db->table('person')->insertBatch($data);
    }
}
