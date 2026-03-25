<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tours extends BaseController
{
    /**
     * Renders a single tour detail page.
     * URL: GET /tours/(:num)
     */
    public function show($id = null)
    {
        $tourModel = new \App\Models\UserModel(); // Wait, I need TourModel!
        $tourModel = new \App\Models\TourModel();
        
        $tour = $tourModel->find($id);

        if (!$tour) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $tour['name'] . ' Tour',
            'tour'  => $tour
        ];

        return view('pages/tour_detail', $data);
    }
}
