<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateToursTable extends Migration
{
    /**
     * The up() method is used to create the table and its columns in the database.
     * It is executed when we run `php spark migrate`.
     */
    public function up()
    {
        // define the fields for the 'tours' table
        $this->forge->addField([
            // Primary key: id (auto-incrementing, unsigned integer)
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // Name of the tour (must be unique)
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            // URL-friendly version of the tour name
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            // Duration of the tour in days
            'duration' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            // Maximum number of people allowed in a group for this tour
            'maxGroupSize' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            // Difficulty level of the tour: 'easy', 'medium', or 'difficult'
            'difficulty' => [
                'type'       => 'ENUM',
                'constraint' => ['easy', 'medium', 'difficult'],
            ],
            // Average rating across all reviews (ranges from 1.00 to 5.00)
            'ratingsAverage' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,2',
                'default'    => 4.5,
            ],
            // Total number of ratings/reviews for this tour
            'ratingsQuantity' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            // Base price of the tour
            'price' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            // Discounted price (if any)
            'priceDiscount' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            // Short summary of the tour
            'summary' => [
                'type' => 'TEXT',
            ],
            // Full detailed description of the tour
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Main cover image filename
            'imageCover' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            // Additional images (stored as a JSON string array)
            'images' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Planned start dates for the tour (stored as a JSON string array)
            'startDates' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Timestamp when the tour was created
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            // Timestamp when the tour was last updated
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            // Timestamp for soft-deleting the tour
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        // Add 'id' as the primary key
        $this->forge->addKey('id', true);
        
        // Finalize and create the 'tours' table
        $this->forge->createTable('tours');
    }

    /**
     * The down() method is used to reverse the migration.
     * It is executed when we run `php spark migrate:rollback`.
     */
    public function down()
    {
        // Drop the 'tours' table if it exists
        $this->forge->dropTable('tours');
    }
}
