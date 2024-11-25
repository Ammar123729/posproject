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
        $records = AddParty::with(['sale.items', 'purchase.items'])->get();

        $partyData = $records->map(function ($party) {
            // Use the null-safe operator `?` to handle missing relationships
            $saleQuantity = $party->sale->flatMap(fn($sale) => $sale->items)->sum('quantity') ?? 0;
            $saleAmount = $party->sale->flatMap(fn($sale) => $sale->items)->sum('total') ?? 0;
            $purchaseQuantity = $party->purchase->flatMap(fn($purchase) => $purchase->items)->sum('quantity') ?? 0;
            $purchaseAmount = $party->purchase->flatMap(fn($purchase) => $purchase->items)->sum('total') ?? 0;

            return [
                'party_name' => $party->party_name,
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
