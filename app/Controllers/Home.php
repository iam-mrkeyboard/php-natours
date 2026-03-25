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
        $tourModel = new \App\Models\TourModel();
        $tours = $tourModel->findAll();

        $data = [
            'title'    => 'Exciting tours for adventurous people',
            'tours'    => $tours,
            'showHero' => true
        ];

        return view('pages/home', $data);
    }

    public function about(): string
    {
        $data = [
            'title'    => 'About Us',
            'showHero' => false
        ];
        return view('pages/about', $data);
    }

    public function contact(): string
    {
        $data = [
            'title'    => 'Contact Us',
            'showHero' => false
        ];
        return view('pages/contact', $data);
    }
}
