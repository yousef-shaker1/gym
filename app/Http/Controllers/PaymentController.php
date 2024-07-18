<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Order;
use App\Mail\sendorder;
use App\Models\Section;
use App\Models\Customer;
use App\Models\rale_offer;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Requests\checkdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function payment(checkdate $request, $id)
    {
        $customer = Customer::where('email', Auth::user()->email)->first();
        $section = Section::where('id', $id)->first();
        $date = $request->input('date');
        $rale_offer = rale_offer::where('id',$request->rale_offer)->where('section_id', $section->id)->first();
        
        Stripe::setApiKey(config('services.stripe.secret'));
    
        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Send me money!!',
                        ],
                        'unit_amount' => $rale_offer->price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
    Order::create([
        'customer_id' => $customer->id,
        'day' => $date,
        'rale_offer_id' => $rale_offer->id,
        'status' => 'قبول',
    ]);
    $customer_name = $customer->name;
    $section_name = $section->name;
    $price = $rale_offer->price;
    $time = $rale_offer->offer->subscription;
    if($time === '1 month'){
        $endDate = Carbon::parse($date)->addDays(30)->format('Y-m-d');
    } elseif ($time === '3 month'){
        $endDate = Carbon::parse($date)->addDays(90)->format('Y-m-d');
    }elseif ($time === ' 6 month'){
        $endDate = Carbon::parse($date)->addDays(180)->format('Y-m-d');
    } elseif ($time === ' 1 year'){
        $endDate = Carbon::parse($date)->addDays(365)->format('Y-m-d');
    }

    Mail::to($customer->email)->send(new sendorder($customer_name, $date, $price, $endDate, $section_name));
    return redirect()->away($session->url);

    }
    public function successtransaction()
    {
        session()->flash('Add', 'تم عمل الدفع بنجاح');
        return redirect()->back();
    }
    
    public function canceltransaction(){
        session()->flash('error', 'فشلت عملية الدفع يرجي التحقق من البيانات');
        return redirect()->back();
    }
    // }
}
