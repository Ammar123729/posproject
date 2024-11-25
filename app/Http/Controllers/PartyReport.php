<?php

namespace App\Http\Controllers;

use App\Models\AddParty;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class PartyReport extends Controller
{
    public function allparty()
    {
        $allparty = AddParty::all();
        return view('partyreport.allparty', compact('allparty'));
    }

    public function partystatement()
    {
        $sellstatement = Sale::all();
        $partystatement = Purchase::all();
        return view('partyreport.partystatement', compact('sellstatement', 'partystatement'));
    }

    public function party_profitloss()
    {
        return view('partyreport.partywiseprofitloss');
    }

    public function party_reportitem()
    {
        $records = AddParty::with(['sale.Items', 'purchase.Items'])->get();

        $partyData = $records->map(function ($party) {
            $saleQuantity = $party->sales->sum(fn($sale) => $sale->Items->sum('quantity'));
            $saleAmount = $party->sales->sum(fn($sale) => $sale->Items->sum('total'));
            $purchaseQuantity = $party->purchases->sum(fn($purchase) => $purchase->Items->sum('quantity'));
            $purchaseAmount = $party->purchases->sum(fn($purchase) => $purchase->Items->sum('total'));

            return [
                'party_name' => $party->name,
                'sale_quantity' => $saleQuantity,
                'sale_amount' => $saleAmount,
                'purchase_quantity' => $purchaseQuantity,
                'purchase_amount' => $purchaseAmount,
            ];
        });
        return view('partyreport.partyreportitem', compact('partyData'));
    }

    public function sale_purchaseparty()
    {
        return view('partyreport.salepurchaseparty');
    }
}
