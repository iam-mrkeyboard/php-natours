<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * The MainSeeder coordinates the execution of all other seeders.
     * Order is important here because of foreign key relationships.
     */
    public function run()
    {
        // 1. Seed Users first
        $this->call('UserSeeder');
        
        // 2. Seed Tours next
        $this->call('TourSeeder');
        
        // 3. Seed Reviews last (because they depend on Users and Tours)
        $this->call('ReviewSeeder');
    }
}
