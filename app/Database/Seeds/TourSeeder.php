<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * The run() method populates the 'tours' table with sample data.
     * It is executed when we run `php spark db:seed TourSeeder`.
     */
    public function run()
    {
        $data = [
            [
                'name'            => 'The Forest Hiker',
                'slug'            => 'the-forest-hiker',
                'duration'        => 5,
                'maxGroupSize'    => 25,
                'difficulty'      => 'easy',
                'ratingsAverage'  => 4.7,
                'ratingsQuantity' => 37,
                'price'           => 397,
                'summary'         => 'Breathtaking hike through the Canadian forest',
                'description'     => 'The Canadian forest is beautiful. This tour will take you through the best parts.',
                'imageCover'      => 'tour-1-cover.jpg',
                'images'          => json_encode(['tour-1-1.jpg', 'tour-1-2.jpg', 'tour-1-3.jpg']),
                'startDates'      => json_encode(['2026-04-25', '2026-07-20']),
            ],
            [
                'name'            => 'The Sea Explorer',
                'slug'            => 'the-sea-explorer',
                'duration'        => 7,
                'maxGroupSize'    => 15,
                'difficulty'      => 'medium',
                'ratingsAverage'  => 4.8,
                'ratingsQuantity' => 23,
                'price'           => 497,
                'summary'         => 'Explore the crystal clear waters of the Mediterranean',
                'description'     => 'The Mediterranean sea is full of surprises. Join us on this amazing journey.',
                'imageCover'      => 'tour-2-cover.jpg',
                'images'          => json_encode(['tour-2-1.jpg', 'tour-2-2.jpg', 'tour-2-3.jpg']),
                'startDates'      => json_encode(['2026-05-15', '2026-08-28']),
            ],
        ];

        // Insert multiple tours at once
        $this->db->table('tours')->insertBatch($data);
    }
}
