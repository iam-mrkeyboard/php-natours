<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * The up() method is used to create the 'bookings' table.
     * This table records when a user successfully books a tour.
     */
    public function up()
    {
        $this->forge->addField([
            // Primary key: id
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // Link to the specific tour booked
            'tour_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            // Link to the user who made the booking
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            // Price at the time of booking (in case prices change later)
            'price' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            // Status of the payment
            'paid' => [
                'type'       => 'BOOLEAN',
                'default'    => true,
            ],
            // Automatic timestamps for record keeping
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        
        // Foreign key constraints to ensure data consistency
        $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('bookings');
    }

    /**
     * The down() method is used to rollback the migration.
     */
    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
