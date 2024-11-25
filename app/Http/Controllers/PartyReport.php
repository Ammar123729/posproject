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
        $data = AddParty::with(['sale.items', 'purchase.items'])
            ->get()
            ->map(function ($party) {
                $saleQuantity = $party->sale->sum(fn($sale) => $sale->items->sum('quantity'));
                $saleAmount = $party->sale->sum(fn($sale) => $sale->items->sum('total'));
                // $purchaseQuantity = $party->purchase->items->sum('quantity');
                // $purchaseAmount = $party->purchase->items->sum('total');
                $purchaseQuantity = $party->purchase->sum(fn($purchase) => $purchase->items->sum('quantity'));
                $purchaseAmount = $party->purchase->sum(fn($purchase) => $purchase->items->sum('total'));

                return [
                    'party_name' => $party->party_name,
                    'date' => now()->format('Y-m-d'),
                    'sale_quantity' => $saleQuantity,
                    'sale_amount' => $saleAmount,
                    'purchase_quantity' => $purchaseQuantity,
                    'purchase_amount' => $purchaseAmount,
                ];
            });


        return view('partyreport.partyreportitem', compact('data'));
    }


    public function sale_purchaseparty()
    {
        $reportdata = AddParty::with('sale', 'purchase')->get()->map(function ($party) {
            $saleam = $party->sale->sum('cash_details');
            $purchaseam = $party->purchase->sum('cash_details');

            return [
                'party_name' => $party->party_name,
                'cash_details' => $saleam,
                'cash_details' => $purchaseam
            ];
        });


        return view('partyreport.salepurchaseparty', compact('reportdata'));
    }
}
