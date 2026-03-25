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

    /**
     * Uploads a cover image for a tour
     * URL: POST /api/v1/tours/(:num)/upload-cover
     */
    public function uploadCover($id = null)
    {
        // Load our custom upload helper
        helper('upload_helper');

        $tourModel = new \App\Models\TourModel();
        
        // Check if the tour exists
        if (!$tourModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'No tour found with that ID'
            ])->setStatusCode(404);
        }

        // Get the uploaded photo file from the request
        $file = $this->request->getFile('photo');

        // Check if a file was actually uploaded
        if (!$file) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'No photo provided'
            ])->setStatusCode(400);
        }

        // Attempt to upload the image to the 'tours' sub-directory
        $filename = upload_image($file, 'tours');

        if ($filename) {
            // Update the tour record with the new image cover filename
            $tourModel->update($id, ['imageCover' => $filename]);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Cover image uploaded successfully',
                'data' => [
                    'imageCover' => $filename
                ]
            ]);
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'message' => 'Failed to upload image'
        ])->setStatusCode(500);
    }
}
