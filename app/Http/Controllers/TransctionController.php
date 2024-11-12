<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class TransctionController extends Controller
{
    public function get_invreport(Request $request)
    {
        // Get start and end dates from request
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        // Fetch sales and group them by party_name with date range filtering
        $query = Sale::with('items')
            ->orderBy('party_name')
            ->with('party');

        // Apply date range filter if dates are provided
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $sales = $query->get()->groupBy('party_name');

        // Prepare totals for each party
        $partyTotals = [];
        foreach ($sales as $partyName => $partySales) {
            $totalAmount = 0;
            $totalCredit = 0;
            $RemainingBlance = 0;
            foreach ($partySales as $sale) {
                foreach ($sale->items as $item) {
                    $totalAmount += $item->total;
                    if ($sale->payment_method === 'Credit') {
                        $totalCredit += $item->total;
                    }
                }
            }

            $partyTotals[$partyName] = [
                'totalAmount' => $totalAmount,
                'totalCredit' => $totalCredit,
                'RemainingBlance' => $totalAmount - $totalCredit,
            ];
        }

        // Calculate total amount for cash sales
        $cashTotal = Sale::where('payment_method', 'cash')
            ->join('sale_items', 'sales.id', '=', 'sale_items.sale_id')
            ->sum('sale_items.total');

        // Calculate total amount for credit sales
        $creditTotal = Sale::where('payment_method', 'credit')
            ->join('sale_items', 'sales.id', '=', 'sale_items.sale_id')
            ->sum('sale_items.total');

        // Calculate total amount for cash sales
        // $cashTotal = Sale::where('payment_method', 'cash')
        //     ->join('sale_items', 'sales.id', '=', 'sale_items.sale_id')
        //     ->whereBetween('sales.date', [$startDate, $endDate])
        //     ->sum('sale_items.total');

        // Calculate total amount for credit sales
        // $creditTotal = Sale::where('payment_method', 'credit')
        //     ->join('sale_items', 'sales.id', '=', 'sale_items.sale_id')
        //     ->whereBetween('sales.date', [$startDate, $endDate])
        //     ->sum('sale_items.total');

        $totalamnt = $cashTotal + $creditTotal;

        return view('transctionreport.salereport', compact('sales', 'partyTotals', 'cashTotal', 'creditTotal', 'totalamnt'));
    }
}
