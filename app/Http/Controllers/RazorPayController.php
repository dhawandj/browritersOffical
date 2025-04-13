<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class RazorPayController extends Controller
{

    public function createOrder(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $orderData = [
            'receipt'         => 'rcptid_' . rand(1000, 9999),
            'amount'          => intval($request->amount * 100), // amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto-capture
        ];

        try {
            //creating the order
            $razorpayOrder = $api->order->create($orderData);
            // dd($razorpayOrder['amount']);
            return response()->json([
                'orderId' => $razorpayOrder['id'],
                'razorpayKey' => env('RAZORPAY_KEY'),
                // 'amount' => $request->amount,
                'amount' => $razorpayOrder['amount'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyPayment(Request $request)
    {

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
        ];

        try {
            //verifying payment
            $api->utility->verifyPaymentSignature($attributes);

            $payment =    $api->payment->fetch($request->razorpay_payment_id);
            //storing in db
            if (Auth::check()) {

                $user = Auth::user();
                // Create a new order using the relationship
                $order =   Order::create([
                    'user_id' => $user->id,
                    'payment_id' => $payment->id, // Assuming Razorpay Payment ID
                    'amount' => $payment->amount / 100, // Razorpay amounts are in paise
                    'payment_status' => $payment->status,
                    'contact' => $payment->contact,
                ]);
                Log::info('Books data received in request:', $request->books);

                // Add books to the order using Book model directly
                $books = $request->books; // Assuming the books data is passed in the request
                try {
                    foreach ($books as $bookData) {
                        Book::create([
                            'name' => $bookData['name'],
                            'pages' => $bookData['pages'],
                            'category' => $bookData['category'],
                            'order_id' => $order->id,
                        ]);
                    }
                } catch (\Exception $e) {
                    Log::error('Error creating book:', ['error' => $e->getMessage()]);
                    return response()->json(['error' => 'Failed to add books to the order'], 400);
                }

            }

            return response()->json([
                'message' => 'Payment verified successfully!',
                'paymentDetails' =>  [
                    'payment_id' => $payment->id, // Assuming Razorpay Payment ID
                    'amount' => $payment->amount / 100, // Razorpay amounts are in paise
                    'status' => $payment->status,
                    'contact' => $payment->contact,
                    'auth' => Auth::check(),
                    'user' => Auth::user(),
                    'books'=>$request->books,
                    'order'=>$order
                ],
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment verification failed dd'.$e], 400);
        }
    }
}
