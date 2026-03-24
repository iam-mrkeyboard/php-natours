<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * The up() method is used to create the 'reviews' table.
     * It includes foreign key relationships to both 'tours' and 'users'.
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
            // The actual review text
            'review' => [
                'type' => 'TEXT',
            ],
            // Rating given by the user (typically 1 to 5)
            'rating' => [
                'type'       => 'INT',
                'constraint' => 1,
            ],
            // Reference to the tour being reviewed
            'tour_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            // Reference to the user who wrote the review
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            // Timestamps
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
        
        // Define foreign keys for data integrity
        $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('reviews');
    }

    /**
     * The down() method drops the 'reviews' table.
     */
    public function down()
    {
        $this->forge->dropTable('reviews');
    }
}
