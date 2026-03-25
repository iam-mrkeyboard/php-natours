<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookingController extends BaseController
{
    /**
     * Creates a Stripe Checkout Session for a tour
     * URL: GET /api/v1/bookings/checkout-session/(:num)
     */
    public function getCheckoutSession($tourId)
    {
        // 1) Get the tour
        $tourModel = new \App\Models\TourModel();
        $tour = $tourModel->find($tourId);

        if (!$tour) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'No tour found with that ID'
            ])->setStatusCode(404);
        }

        // 2) Set up Stripe
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // 3) Create Checkout Session
        // Note: success_url and cancel_url would typically point to your frontend
        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'success_url' => base_url('bookings/success'),
                'cancel_url' => base_url('tours/' . $tour['slug']),
                'customer_email' => 'test@example.com', // In production, get from authenticated user
                'client_reference_id' => $tourId,
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $tour['price'] * 100, // Amount in cents
                        'product_data' => [
                            'name' => $tour['name'] . ' Tour',
                            'description' => $tour['summary'],
                            // 'images' => [base_url('uploads/tours/' . $tour['imageCover'])],
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
            ]);

            // 4) Return session as JSON
            return $this->response->setJSON([
                'status' => 'success',
                'session' => $session
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
