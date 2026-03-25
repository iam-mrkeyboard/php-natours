<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TourController extends BaseController
{
    /**
     * Lists all tours
     * URL: GET /api/v1/tours
     */
    public function index()
    {
        $tourModel = new \App\Models\TourModel();
        $tours = $tourModel->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'results' => count($tours),
            'data' => [
                'tours' => $tours
            ]
        ]);
    }

    /**
     * Displays a single tour detail
     * URL: GET /api/v1/tours/(:num)
     */
    public function show($id = null)
    {
        $tourModel = new \App\Models\TourModel();
        $tour = $tourModel->find($id);

        if (!$tour) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'No tour found with that ID'
            ])->setStatusCode(404);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'tour' => $tour
            ]
        ]);
    }

    /**
     * Creates a new tour
     * URL: POST /api/v1/tours
     */
    public function create()
    {
        $tourModel = new \App\Models\TourModel();
        $json = $this->request->getJSON(true);

        if ($tourModel->insert($json)) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => [
                    'tour' => $tourModel->find($tourModel->insertID())
                ]
            ])->setStatusCode(201);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $tourModel->errors()
        ])->setStatusCode(400);
    }

    /**
     * Updates an existing tour
     * URL: PATCH /api/v1/tours/(:num)
     */
    public function update($id = null)
    {
        $tourModel = new \App\Models\TourModel();
        $json = $this->request->getJSON(true);

        if (!$tourModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'No tour found with that ID'
            ])->setStatusCode(404);
        }

        if ($tourModel->update($id, $json)) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => [
                    'tour' => $tourModel->find($id)
                ]
            ]);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'errors' => $tourModel->errors()
        ])->setStatusCode(400);
    }

    /**
     * Deletes a tour (Soft Delete)
     * URL: DELETE /api/v1/tours/(:num)
     */
    public function delete($id = null)
    {
        $tourModel = new \App\Models\TourModel();

        if (!$tourModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'No tour found with that ID'
            ])->setStatusCode(404);
        }

        $tourModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => null
        ])->setStatusCode(204); // No Content
    }
}
