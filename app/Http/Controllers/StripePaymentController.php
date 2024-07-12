<?php
namespace App\Http\Controllers;

use App\Models\EnrollmentModel;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Stripe\Charge::create([
                "amount" => 100 * 100, // amount in cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Maaz.com"
            ]);

            if ($charge->status === 'succeeded') {
                $userId = $request->user_id;
                $courseId = $request->course_id;

                EnrollmentModel::updateOrCreate(
                    ['user_id' => $userId, 'course_id' => $courseId],
                    ['status' => true]
                );

                Session::flash('success', 'Payment successful!');
                return redirect()->route('order');
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Payment failed: ' . $e->getMessage());
            return redirect()->route('home');
        }

        return redirect()->back();
    }
}
