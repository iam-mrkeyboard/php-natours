<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    /**
     * Handles new user registration (Signup)
     * URL: POST /api/v1/users/signup
     */
    public function signup()
    {
        // Load the UserModel
        $userModel = new \App\Models\UserModel();

        // Get JSON data from the request body
        $json = $this->request->getJSON(true);

        // Attempt to save the user data
        // The model will automatically handle validation and password hashing
        if ($userModel->insert($json)) {
            // If successful, return the new user ID and a success message
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'User registered successfully',
                'data'    => [
                    'user_id' => $userModel->insertID()
                ]
            ])->setStatusCode(201); // 201 Created
        }

        // If validation fails, return the error messages
        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $userModel->errors()
        ])->setStatusCode(400); // 400 Bad Request
    }
}
