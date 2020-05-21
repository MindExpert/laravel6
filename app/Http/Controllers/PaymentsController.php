<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');

    }

    public function store()
    {
        # Core Logic
        // Process the payment
        // unlock the purchase

        //Notification::send(request()->user(), new PaymentReceived(3200));

        ProductPurchased::dispatch('toy');

        //event(new ProductPurchased('toy'));

        # Side Effects
        // award achievements
        // send sharebal coupon tp user
        // Notify the user about the payment
    }
}
