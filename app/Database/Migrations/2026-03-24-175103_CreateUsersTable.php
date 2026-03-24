<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    /**
     * The up() method is used to create the table and its columns in the database.
     * It is executed when we run `php spark migrate`.
     */
    public function up()
    {
        // define the fields for the 'users' table
        $this->forge->addField([
            // Primary key: id (auto-incrementing, unsigned integer)
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // User's full name
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            // User's email address (must be unique for each user)
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            // Hashed password for security
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            // User roles: 'user' is default, 'guide', 'lead-guide', or 'admin' for system access levels
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['user', 'guide', 'lead-guide', 'admin'],
                'default'    => 'user',
            ],
            // Profile picture filename (defaults to 'default.jpg')
            'photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default'    => 'default.jpg',
            ],
            // Timestamp when the user record was created
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            // Timestamp when the user record was last updated
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            // Timestamp for soft-deleting the user record (instead of permanent removal)
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        // Add 'id' as the primary key
        $this->forge->addKey('id', true);
        
        // Finalize and create the 'users' table
        $this->forge->createTable('users');
    }

    /**
     * The down() method is used to reverse the migration.
     * It is executed when we run `php spark migrate:rollback`.
     */
    public function down()
    {
        // Drop the 'users' table if it exists
        $this->forge->dropTable('users');
    }
}
