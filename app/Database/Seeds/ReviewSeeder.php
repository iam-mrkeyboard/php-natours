<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * The run() method populates the 'reviews' table.
     * Reviews are linked to users and tours by their IDs.
     */
    public function run()
    {
        $data = [
            [
                'review'  => 'An amazing experience! The forest was beautiful.',
                'rating'  => 5,
                'tour_id' => 1, // The Forest Hiker
                'user_id' => 3, // Regular User
            ],
            [
                'review'  => 'Good tour, but a bit exhausting for beginners.',
                'rating'  => 4,
                'tour_id' => 1, // The Forest Hiker
                'user_id' => 2, // Lead Guide
            ],
            [
                'review'  => 'Crystal clear water, truly a sea explorer dream!',
                'rating'  => 5,
                'tour_id' => 2, // The Sea Explorer
                'user_id' => 3, // Regular User
            ],
        ];

        // Insert reviews into the database
        $this->db->table('reviews')->insertBatch($data);
    }
}
