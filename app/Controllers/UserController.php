<?php

namespace App\Controllers;

use App\Controllers\BaseController;

/**
 * UserController handles the frontend views for user accounts and profiles.
 */
class UserController extends BaseController
{
    /**
     * Renders the user account/profile page.
     * URL: GET /me
     */
    public function index()
    {
        // For now, we simulate a logged-in user if NO AUTH is present yet
        // In Phase 5, we will implement real session check
        $userData = [
            'name'  => 'Jonas Schmedtmann',
            'email' => 'jonas@example.com',
            'role'  => 'user'
        ];

        $data = [
            'title' => 'My Account',
            'user'  => $userData
        ];

        return view('pages/account', $data);
    }
}
