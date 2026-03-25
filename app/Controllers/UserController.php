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
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $user = session()->get('user');

        $data = [
            'title' => 'My Account',
            'user'  => $user
        ];

        return view('pages/account', $data);
    }

    /**
     * Renders the user's booking history.
     * URL: GET /my-tours
     */
    public function bookings()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $user = session()->get('user');
        $bookingModel = new \App\Models\BookingModel();
        
        // Find all bookings for the logged-in user
        // Note: BookingModel should ideally join with tour data
        $bookings = $bookingModel->where('userId', $user['id'])->findAll();

        $data = [
            'title'    => 'My Bookings',
            'user'     => $user,
            'bookings' => $bookings
        ];

        return view('pages/my_bookings', $data);
    }
}
