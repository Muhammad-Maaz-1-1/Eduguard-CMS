<?php

namespace App\Http\Controllers;

use App\Models\cartModel;
use App\Models\EnrollmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        $cartModel = cartModel::where('user_id', Auth::id())->get();
        $subtotal = 0;
        foreach ($cartModel as $item) {
            if ($item->course) {
                $finalPrice = floatval($item->course->final_price);
                $subtotal += $finalPrice;
            }
        }

        $total = $subtotal;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Stripe\Charge::create([
                "amount" => $total * 100, // amount in cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Eduguard"
            ]);

            if ($charge->status == 'succeeded') {

            foreach( $cartModel as $item){
                $enrollment= new EnrollmentModel();
                $enrollment->user_id= Auth::user()->id;
                $enrollment->course_id= $item->id;
                $enrollment->save();
            }
            foreach ($cartModel as $item) {
                $item->delete();
            }

                Session::flash('success', 'Payment successful!');
                return redirect()->route('students_profile');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            Session::flash('error', 'Payment failed: ' . $e->getMessage());
            return redirect()->route('home');
        }

        return redirect()->back();
    }
}
