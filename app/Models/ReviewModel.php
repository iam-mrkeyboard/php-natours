<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    /**
     * Name of the database table for Reviews
     */
    protected $table            = 'reviews';
    
    /**
     * Primary key for the table
     */
    protected $primaryKey       = 'id';
    
    /**
     * Use auto-incrementing ID
     */
    protected $useAutoIncrement = true;
    
    /**
     * Return type for the data
     */
    protected $returnType       = 'array';
    
    /**
     * Fields that can be set during create or update
     */
    protected $allowedFields    = ['review', 'rating', 'tour_id', 'user_id'];

    /**
     * Automatic timestamp management
     */
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Validation rules for the Review data
     */
    protected $validationRules      = [
        'review'  => 'required|min_length[5]',
        'rating'  => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]',
        'tour_id' => 'required|numeric',
        'user_id' => 'required|numeric',
    ];
}
