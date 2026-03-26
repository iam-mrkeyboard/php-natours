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
        
        // Use getPost for better compatibility with form-encoded data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Fallback to JSON if POST is empty
        if (!$email || !$password) {
            $json = $this->request->getJSON(true);
            $email = $json['email'] ?? $email;
            $password = $json['password'] ?? $password;
        }

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
     * Updates the currently logged-in user's profile data.
     * URL: POST /api/v1/users/updateMe
     */
    public function updateMe()
    {
        if (!session()->has('user')) {
            return $this->response->setJSON(['status' => 'fail', 'message' => 'Not logged in'])->setStatusCode(401);
        }

        $userSession = session()->get('user');
        $userModel = new \App\Models\UserModel();
        
        $data = $this->request->getPost(); // Use getPost for FormData support
        $updateData = [];

        if (isset($data['name'])) $updateData['name'] = $data['name'];
        if (isset($data['email'])) $updateData['email'] = $data['email'];

        // Handle Photo Upload
        $file = $this->request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/img/users', $newName);
            $updateData['photo'] = $newName;
        }

        if ($userModel->update($userSession['id'], $updateData)) {
            $user = $userModel->find($userSession['id']);
            
            // Update Session
            session()->set('user', [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'role'  => $user['role'],
                'photo' => $user['photo']
            ]);

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Profile updated successfully',
                'data'    => ['user' => $user]
            ]);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $userModel->errors()
        ])->setStatusCode(400);
    }

    /**
     * Updates the currently logged-in user's password.
     * URL: POST /api/v1/users/updateMyPassword
     */
    public function updateMyPassword()
    {
        if (!session()->has('user')) {
            return $this->response->setJSON(['status' => 'fail', 'message' => 'Not logged in'])->setStatusCode(401);
        }

        $userSession = session()->get('user');
        $userModel = new \App\Models\UserModel();
        $json = $this->request->getJSON(true);

        $user = $userModel->find($userSession['id']);
        
        // 1) Check if current password is correct
        if (!password_verify($json['passwordCurrent'], $user['password'])) {
            return $this->response->setJSON(['status' => 'fail', 'message' => 'Correct password is required'])->setStatusCode(401);
        }

        // 2) Update with new password
        if ($userModel->update($userSession['id'], [
            'password' => $json['password'],
            'passwordConfirm' => $json['passwordConfirm']
        ])) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Password updated successfully'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $userModel->errors()
        ])->setStatusCode(400);
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
