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
    protected $allowedFields    = ['name', 'email', 'password', 'role', 'photo', 'passwordChangedAt'];

    /**
     * Validation Rules
     */
    protected $validationRules = [
        'name'     => 'required|min_length[3]|max_length[50]',
        'email'    => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[8]',
        'passwordConfirm' => 'matches[password]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'This email address is already in use.'
        ],
        'passwordConfirm' => [
            'matches' => 'Passwords do not match.'
        ]
    ];

    /**
     * Callbacks
     */
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword', 'setPasswordChangedAt'];

    /**
     * Hashes the password if it's present in the data array.
     */
    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    /**
     * Sets the passwordChangedAt field when a password is changed.
     */
    protected function setPasswordChangedAt(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        // Set to current time minus 1 second to ensure JWT issued after this
        $data['data']['passwordChangedAt'] = date('Y-m-d H:i:s', time() - 1);

        return $data;
    }

    /**
     * Helper to verify if the provided password is correct.
     */
    public function correctPassword($candidatePassword, $userPassword)
    {
        return password_verify($candidatePassword, $userPassword);
    }
}
