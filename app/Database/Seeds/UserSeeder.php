<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * The run() method is where you define the data to be seeded.
     * It is executed when we run `php spark db:seed UserSeeder`.
     */
    public function run()
    {
        $data = [
            [
                'name'     => 'Admin User',
                'email'    => 'admin@natours.io',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'role'     => 'admin',
                'photo'    => 'default.jpg',
            ],
            [
                'name'     => 'Lead Guide',
                'email'    => 'guide@natours.io',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'role'     => 'lead-guide',
                'photo'    => 'default.jpg',
            ],
            [
                'name'     => 'Regular User',
                'email'    => 'user@natours.io',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'role'     => 'user',
                'photo'    => 'default.jpg',
            ],
        ];

        // Using Query Builder to insert data into 'users' table
        $this->db->table('users')->insertBatch($data);
    }
}
