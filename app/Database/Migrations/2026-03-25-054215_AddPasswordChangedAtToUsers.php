<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordChangedAtToUsers extends Migration
{
    public function up()
    {
        // Add 'passwordChangedAt' column to 'users' table
        $this->forge->addColumn('users', [
            'passwordChangedAt' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'photo', // Placing it after photo field
            ],
        ]);
    }

    public function down()
    {
        // Remove 'passwordChangedAt' column from 'users' table
        $this->forge->dropColumn('users', 'passwordChangedAt');
    }
}
