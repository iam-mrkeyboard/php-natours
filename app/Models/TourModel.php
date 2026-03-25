<?php

namespace App\Models;

use CodeIgniter\Model;

class TourModel extends Model
{
    /**
     * Name of the database table for Tours
     */
    protected $table            = 'tours';
    
    /**
     * Primary key for the table
     */
    protected $primaryKey       = 'id';
    
    /**
     * Whether to use auto-incrementing ID
     */
    protected $useAutoIncrement = true;
    
    /**
     * Return type for the data
     */
    protected $returnType       = 'array';
    
    /**
     * Use soft deletes to keep historical data
     */
    protected $useSoftDeletes   = true;
    
    /**
     * Fields that can be set during create or update
     */
    protected $allowedFields    = [
        'name', 'slug', 'duration', 'maxGroupSize', 'difficulty', 
        'ratingsAverage', 'ratingsQuantity', 'price', 'priceDiscount', 
        'summary', 'description', 'imageCover', 'images', 'startDates'
    ];

    /**
     * Automatic timestamp management
     */
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Validation rules for the Tour data
     */
    protected $validationRules      = [
        'name'         => 'required|min_length[5]|max_length[255]',
        'duration'     => 'required|numeric',
        'maxGroupSize' => 'required|numeric',
        'difficulty'   => 'required|in_list[easy,medium,difficult]',
        'price'        => 'required|numeric',
        'summary'      => 'required',
        'imageCover'   => 'required',
    ];
    
    /**
     * Callbacks: We generate the slug from the name automatically
     */
    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    /**
     * Converts a name into a URL-friendly slug
     */
    protected function generateSlug(array $data)
    {
        if (isset($data['data']['name'])) {
            $data['data']['slug'] = strtolower(url_title($data['data']['name']));
        }
        return $data;
    }
}
