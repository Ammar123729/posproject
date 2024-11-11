<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function expenses(Request $request)
    {
        $query = Expenses::query();

        // Check if the request has 'start' and 'end' date inputs
        if ($request->has('start') && $request->has('end') && !empty($request->input('start')) && !empty($request->input('end'))) {
            $startDate = $request->input('start');
            $endDate = $request->input('end');

            // Filter records by date range
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        // Get the filtered results or all expenses if no filter is applied
        $salepaymntin = $query->get();

        // Return the view with the expenses data
        return view('expenses.expenses', compact('salepaymntin'));
    }

    public function ex_store(Request $request)
    {
        $request->validate([
            'decription' => 'required',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date'
        ]);

        Expenses::create([
            'decription' => $request->decription,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Expenses Store');
    }
}
