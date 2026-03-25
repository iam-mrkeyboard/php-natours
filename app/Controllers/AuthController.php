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

    /**
     * Handles user login
     * URL: POST /api/v1/users/login
     */
    public function login()
    {
        // Load the UserModel
        $userModel = new \App\Models\UserModel();

        // Get JSON data from request
        $json = $this->request->getJSON(true);
        $email = $json['email'] ?? '';
        $password = $json['password'] ?? '';

        // Check if user exists by email
        $user = $userModel->where('email', $email)->first();

        // If user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            
            // Generate JWT Token
            $key = getenv('JWT_SECRET'); // from .env
            $payload = [
                'iat'  => time(),           // Issued at
                'exp'  => time() + (60*60), // Expires in 1 hour
                'uid'  => $user['id'],      // User ID
                'role' => $user['role']     // User Role
            ];

            $token = \Firebase\JWT\JWT::encode($payload, $key, 'HS256');

            // Return success with the token
            return $this->response->setJSON([
                'status' => 'success',
                'token'  => $token,
                'data'   => [
                    'user' => [
                        'id'    => $user['id'],
                        'name'  => $user['name'],
                        'email' => $user['email'],
                        'role'  => $user['role']
                    ]
                ]
            ]);
        }

        // Invalid credentials
        return $this->response->setJSON([
            'status'  => 'fail',
            'message' => 'Incorrect email or password'
        ])->setStatusCode(401); // 401 Unauthorized
    }
}
