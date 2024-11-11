<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CashBnakController extends Controller
{
    public function cash_hand()
    {

        $cash = Sale::where('payment_method', 'Cash')->get();
        $purchasecash = Purchase::where('payment_method', 'Cash')->get();
        $totalcash = Sale::where('payment_method', 'Cash')->sum('cash_details');
        $totalpurchasecash = Purchase::where('payment_method', 'Cash')->sum('cash_details');
        $totalvalue = $totalcash + $totalpurchasecash;
        // dd($totalvalue);    
        return view('cashbank.cashinhand', compact('cash', 'purchasecash', 'totalvalue'));
    }

    public function bank_detail()
    {
        return view('cashbank.bankdetail');
    }
}
