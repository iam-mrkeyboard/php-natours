<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * BookingModel handles database operations for the 'bookings' table.
 */
class BookingModel extends Model
{
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    // Fields that can be set during insert/update
    protected $allowedFields    = [
        'tour_id',
        'user_id',
        'price',
        'created_at',
        'paid'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Not used for bookings usually

    /**
     * Fetch bookings with tour details for a specific user.
     */
    public function getBookingsByUser($userId)
    {
        return $this->select('bookings.*, tours.name as tour_name, tours.imageCover as tour_image, tours.startDates as tour_date')
                    ->join('tours', 'tours.id = bookings.tour_id')
                    ->where('user_id', $userId)
                    ->findAll();
    }
}
