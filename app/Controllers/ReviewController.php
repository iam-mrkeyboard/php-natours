<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReviewController extends BaseController
{
    /**
     * Lists all reviews
     * URL: GET /api/v1/reviews
     */
    public function index()
    {
        $reviewModel = new \App\Models\ReviewModel();
        $reviews = $reviewModel->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'results' => count($reviews),
            'data' => [
                'reviews' => $reviews
            ]
        ]);
    }

    /**
     * Creates a new review
     * URL: POST /api/v1/reviews
     */
    public function create()
    {
        $reviewModel = new \App\Models\ReviewModel();
        $json = $this->request->getJSON(true);

        if ($reviewModel->insert($json)) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => [
                    'review' => $reviewModel->find($reviewModel->insertID())
                ]
            ])->setStatusCode(201);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $reviewModel->errors()
        ])->setStatusCode(400);
    }
}
