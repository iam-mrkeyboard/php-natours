<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * Renders the landing page of the application.
     * Uses the 'pages/home' view which extends 'layout/main'.
     */
    public function index(): string
    {
        // Data to be passed to the view
        $data = [
            'title' => 'Exciting tours for adventurous people'
        ];

        return view('pages/home', $data);
    }
}
