<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    /**
     * Renders the Login page view.
     * URL: GET /login
     */
    public function loginView()
    {
        return view('pages/login', ['title' => 'Log into your account']);
    }

    /**
     * Renders the Signup page view.
     * URL: GET /signup
     */
    public function signupView()
    {
        return view('pages/signup', ['title' => 'Create your account']);
    }

    /**
     * Handles user registration via API.
     * URL: POST /api/v1/users/signup
     */
    public function signup()
    {
        $userModel = new \App\Models\UserModel();
        $json = $this->request->getJSON(true);

        if ($userModel->insert($json)) {
            $userId = $userModel->insertID();
            $user = $userModel->find($userId);

            // Set User Session
            session()->set('user', [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'role'  => $user['role'],
                'photo' => $user['photo']
            ]);

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'User registered and logged in successfully'
            ])->setStatusCode(201);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $userModel->errors()
        ])->setStatusCode(400);
    }

    /**
     * Handles user login
     * URL: POST /api/v1/users/login
     */
    public function login()
    {
        $userModel = new \App\Models\UserModel();
        $json = $this->request->getJSON(true);
        $email = $json['email'] ?? '';
        $password = $json['password'] ?? '';

        $user = $userModel->where('email', $email)->first();

        // Verify password using native verify (or UserModel helper if implemented)
        if ($user && password_verify($password, $user['password'])) {
            
            // Set User Session
            session()->set('user', [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'role'  => $user['role'],
                'photo' => $user['photo']
            ]);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Logged in successfully'
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'fail',
            'message' => 'Incorrect email or password'
        ])->setStatusCode(401);
    }

    /**
     * Handles user logout
     * URL: GET /logout
     */
    public function logout()
    {
        session()->remove('user');
        return redirect()->to('/');
    }
}
