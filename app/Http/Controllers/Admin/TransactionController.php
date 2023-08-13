<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\Transaction;
use App\Models\Payment\PaymentDetails;

class TransactionController extends Controller
{
    public function indexRegistation() {
        $data = PaymentDetails::get();
        return view('layouts.pages.transaction.registation-index', compact('data'));
    }
}
