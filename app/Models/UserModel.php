<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    /**
     * Name of the database table this model uses
     */
    protected $table            = 'users';
    
    /**
     * Name of the primary key field
     */
    protected $primaryKey       = 'id';
    
    /**
     * Whether to use auto-incrementing primary key
     */
    protected $useAutoIncrement = true;
    
    /**
     * Return type for the data (array or object)
     */
    protected $returnType       = 'array';
    
    /**
     * Whether to use soft deletes (uses deleted_at column instead of hard removal)
     */
    protected $useSoftDeletes   = true;
    
    /**
     * Which fields are allowed to be inserted or updated via the model
     */
    protected $allowedFields    = ['name', 'email', 'password', 'role', 'photo'];

    /**
     * Whether to manage created_at and updated_at automatically
     */
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Validation rules for registering/updating a user
     */
    protected $validationRules      = [
        'name'     => 'required|min_length[2]|max_length[255]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
    ];
    
    /**
     * Custom validation messages
     */
    protected $validationMessages   = [
        'email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
    ];
    
    /**
     * Whether to skip validation during inserts/updates
     */
    protected $skipValidation       = false;

    /**
     * Callbacks: We use 'beforeInsert' and 'beforeUpdate' to hash the password
     * before it ever touches the database.
     */
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hashes the password if it's present in the data array.
     */
    protected function hashPassword(array $data)
    {
        // If password is not set, just return the data as is
        if (! isset($data['data']['password'])) {
            return $data;
        }

        // Hash the password using the default algorithm (currently bcrypt)
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}
