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
        // Load the TourModel to fetch data
        $tourModel = new \App\Models\TourModel();
        
        // Fetch all available tours
        $tours = $tourModel->findAll();

        // Data to be passed to the view
        $data = [
            'title'    => 'Natours | Exciting tours for adventurous people',
            'tours'    => $tours,
            'showHero' => true // Enable the hero section for the landing page
        ];

        return view('pages/home', $data);
    }
}
