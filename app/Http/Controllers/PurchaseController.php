<?php

namespace App\Http\Controllers;

use App\Models\AddItem;
use App\Models\AddParty;
use App\Models\AllData;
use App\Models\ItemData;
use App\Models\Purchase;
use App\Models\PurchasePaymentOut;
use App\Models\PurchaseReturn;
use Carbon\Carbon;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchase_bill(Request $request)
    {
        // Get start and end dates from request
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        // Fetch sales and group them by party_name with date range filtering
        $query = Purchase::with('items')
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
        $cashTotal = Purchase::where('payment_method', 'cash')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->sum('purchase_items.total');

        // Calculate total amount for credit sales
        $creditTotal = Purchase::where('payment_method', 'credit')
            ->join('purchase_items', 'purchases.id', '=', 'purchase_items.purchase_id')
            ->sum('purchase_items.total');

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

        return view('purchase.bill', compact('sales', 'partyTotals', 'cashTotal', 'creditTotal', 'totalamnt'));
    }

    public function pur_pay(Request $request)
    {
        $query = PurchasePaymentOut::query();

        if ($request->has('start') && $request->has('end')) {
            $startDate = $request->input('start');
            $endDate = $request->input('end');

            // Filter records by date range
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $salepaymntin = $query->get();
        $alldata = AllData::all();

        return view('purchase.payment', compact('alldata', 'salepaymntin'));
    }

    //pay Purchase Payment bill

    public function payemnt_pay(Request $request)
    {
        $validated = $request->validate([
            'party_name' => 'required|integer|exists:add_parties,id',
            'purchase_credit' => 'required',
            'purchase_cash' => 'required',
            'add_payment' => 'required|integer',
            'date' => 'required|date',
        ]);
        $alldatafetch = AllData::where('party_name', $request->party_name)->first();

        if ($alldatafetch) {
            $alldatafetch->purchase_credit -= $request->add_payment;

            $alldatafetch->save();
        }

        PurchasePaymentOut::create([
            'party_name' => $request->party_name,
            'purchase_credit' => $request->purchase_credit,
            'purchase_cash' => $request->purchase_cash,
            'add_payment' => $request->add_payment,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Payment aadded');
    }

    public function pur_order()
    {
        return view('purchase.order');
    }

    public function pur_retrun(Request $request)
    {
        $query = PurchaseReturn::query();

        if ($request->has('start') && $request->has('end')) {
            $startDate = Carbon::parse($request->input('start'))->startOfDay();
            $endDate = Carbon::parse($request->input('end'))->endOfDay();

            // Filter records by date range
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $returndata = $query->get();

        return view('purchase.retrun', compact('returndata'));
    }
    //Retrun Purchase item 
    public function purchase_retrun()
    {

        $allparty = AddParty::all();
        $allitems = AddItem::all();
        return view('purchase.purchaseitemreturn', compact('allparty', 'allitems'));
    }

    // purchase Retrun Post Code 

    // public function purchase_item_retrun(Request $request)
    // {

    //     $request->validate([
    //         'party_name' => 'required|exists:add_parties,id',
    //         'item_id' => 'required|array',
    //         'purchase_quantity' => 'required|array',
    //         'return_payment' => 'required|array',
    //         'total_payment' => 'required',
    //         'return_quantity.*' => 'integer|min:1',
    //         'return_payment.*' => 'numeric|min:0',
    //         'date' => 'required|date',

    //     ]);

    //     $partyId = $request->input('party_name');
    //     $itemIds = $request->input('item_id');
    //     $returnQuantities = $request->input('purchase_quantity');
    //     $returnPayments = $request->input('return_payment');

    //     $totalValue = 0; // Initialize total value

    //     foreach ($itemIds as $index => $itemId) {
    //         $returnQuantity = $returnQuantities[$index];
    //         $returnPayment = $returnPayments[$index];

    //         // Calculate total value for the current item return
    //         $totalValue += $returnQuantity * $returnPayment;

    //         // Reduce the sale quantity in ItemData
    //         $itemData = new ItemData();
    //         $success = $itemData->reduceQuantityOnReturn($partyId, $itemId, $returnQuantity);

    //         if ($success) {
    //             // Create a new sale return record
    //             PurchaseReturn::create([
    //                 'party_name' => $partyId,
    //                 'item_id' => $itemId,
    //                 'purchase_quantity' => $returnQuantity,
    //                 'return_payment' => $returnPayment,
    //             ]);
    //         } else {
    //             return redirect()->back()->with('error', 'Error processing sale return. Not enough quantity.');
    //         }
    //     }

    //     // Update the AllData table
    //     $allData = AllData::where('party_name', $partyId)->first(); // Adjust based on how you identify the record
    //     if ($allData) {
    //         // Update sale_return and adjust sale_credit
    //         $allData->sale_return += $totalValue; // Increment sale_return
    //         $allData->sale_credit -= $totalValue; // Decrement sale_credit
    //         $allData->save();
    //     }

    //     return redirect()->back()->with('success', 'Sale returns processed successfully!');
    // }
    public function purchase_item_retrun(Request $request)
    {
        $request->validate([
            'party_name' => 'required|exists:add_parties,id',
            'item_id' => 'required|array',
            'purchase_quantity' => 'required|array',
            'return_payment' => 'required|array',
            'total_payment' => 'required|numeric|min:0', // Validate total_payment
            'return_quantity.*' => 'integer|min:1',
            'return_payment.*' => 'numeric|min:0',
            'date' => 'required|date',
        ]);

        $partyId = $request->input('party_name');
        $itemIds = $request->input('item_id');
        $returnQuantities = $request->input('purchase_quantity');
        $returnPayments = $request->input('return_payment');
        $totalPayment = $request->input('total_payment');
        $date = $request->input('date'); // Get total payment from form

        foreach ($itemIds as $index => $itemId) {
            $returnQuantity = $returnQuantities[$index];

            // Reduce the purchase quantity in ItemData table
            $itemData = ItemData::where('party_name', $partyId)
                ->where('item_id', $itemId)
                ->first();

            if ($itemData && $itemData->purchase_quantity >= $returnQuantity) {
                // Deduct the return quantity from ItemData
                $itemData->purchase_quantity -= $returnQuantity;
                $itemData->save();

                // Record the return in the PurchaseReturn table
                PurchaseReturn::create([
                    'party_name' => $partyId,
                    'item_id' => $itemId,
                    'purchase_quantity' => $returnQuantity,
                    'return_payment' => $returnPayments[$index],
                    'total_payment' => $totalPayment,
                    'date' => $date,
                ]);
            } else {
                return redirect()->back()->with('error', 'Not enough quantity available for return.');
            }
        }

        // Update the AllData table with the total payment
        $allData = AllData::where('party_name', $partyId)->first();
        if ($allData) {
            // Update the purchase_return column with the total payment
            $allData->purchase_return += $totalPayment;

            // Deduct the total payment from the purchase_credit column
            $allData->purchase_credit -= $totalPayment;

            // Save the changes
            $allData->save();
        }

        return redirect()->back()->with('success', 'Purchase return processed successfully!');
    }




    public function pur_item()
    {
        $allparty = AddParty::all();
        $allitems = AddItem::all();
        return view('purchase.purchaseitem', compact('allparty', 'allitems'));
    }

    public function pur_store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'party_name' => 'required|integer|exists:add_parties,id',  // Validate foreign key party_name
            'phone_number' => 'nullable|string|max:20',
            'invoice_number' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'items.*.item_type' => 'required|exists:add_items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0|max:100',
            'items.*.total' => 'required|numeric|min:0',
            'payment_method' => 'required|in:Cash,Credit',
            'cash_details' => 'nullable|numeric|min:0',  // To store cash details (amount)
        ]);

        // Calculate total sale amount
        $totalAmount = collect($request->input('items'))->sum('total');

        // Find the party by ID
        $party = AddParty::find($request->input('party_name'));

        if (!$party) {
            return redirect()->back()->with('error', 'Party not found.');
        }

        // If payment method is "Credit", check the party's credit limit
        if ($request->input('payment_method') === 'Credit') {
            if ($totalAmount > $party->credit_limit) {
                return redirect()->back()->with('error', 'Credit limit exceeded for ' . $party->party_name);
            }

            // Deduct the total amount from the party's credit limit
            $party->credit_limit -= $totalAmount;
            $party->save();
        }

        // Create the sale record
        $sale = Purchase::create($validated);

        // Create sale items, update inventory, and store/update sale_quantity in ItemData
        foreach ($request->input('items') as $itemData) {
            $addItem = AddItem::find($itemData['item_type']);

            if (!$addItem) {
                return redirect()->back()->with('error', 'Item not found in inventory.');
            }

            // Adjust inventory
            $newQuantity = $addItem->item_quantity - $itemData['quantity'];
            if ($newQuantity < 0) {
                return redirect()->back()->with('error', 'Not enough stock for item ID ' . $itemData['item_type']);
            }

            // Update item quantity in the AddItem table
            $addItem->update(['item_quantity' => $newQuantity]);

            // Save sale item
            $sale->items()->create($itemData);

            // Check if a record for this item and party already exists in ItemData
            $itemDataRecord = ItemData::where('party_name', $party->id)
                ->where('item_id', $itemData['item_type'])
                ->first();

            if ($itemDataRecord) {
                // Update the existing sale quantity if record exists
                $itemDataRecord->purchase_quantity += $itemData['quantity'];
                $itemDataRecord->save();
            } else {
                // Create a new record in ItemData if none exists
                ItemData::create([
                    'party_name' => $party->id,
                    'item_id' => $itemData['item_type'],
                    'purchase_quantity' => $itemData['quantity'],
                ]);
            }
        }

        // Check if a record for the party already exists in the all_records table
        $allRecord = AllData::where('party_name', $party->id)->first();

        // Update or create the all_records entry based on payment method
        if ($allRecord) {
            if ($request->input('payment_method') === 'Cash') {
                $allRecord->purchase_cash += $request->input('cash_details');
            } elseif ($request->input('payment_method') === 'Credit') {
                $allRecord->purchase_credit += $totalAmount;  // No cash details for Credit
            }
            $allRecord->save();
        } else {
            // Create a new record if no existing entry found
            AllData::create([
                'party_name' => $party->id,
                'purchase_cash' => $request->input('payment_method') === 'Cash' ? $request->input('cash_details') : null,
                'purchase_credit' => $request->input('payment_method') === 'Credit' ? $totalAmount : null,
            ]);
        }

        // Return success response
        return redirect()->back()->with('success', 'Sale recorded successfully!');
    }




    public function pur_edit($id)
    {
        $sale = Purchase::with('items')->findOrFail($id);
        $allitems = AddItem::all();
        $allparty = AddParty::all();
        return view('purchase.edit', compact('sale', 'allitems', 'allparty'));
    }

    public function pur_update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'party_name' => 'nullable|integer|exists:add_parties,id',
            'phone_number' => 'nullable|string|max:20',
            'invoice_number' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'items.*.item_type' => 'required|exists:add_items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0|max:100',
            'items.*.total' => 'required|numeric|min:0',
            'payment_method' => 'required|in:Cash,Credit',
            'cash_details' => 'nullable|numeric|min:0',
        ]);

        // Find the existing sale record
        $sale = Purchase::find($id);

        if (!$sale) {
            return redirect()->back()->with('error', 'Sale record not found.');
        }

        // Calculate the new total sale amount
        $totalAmount = collect($request->input('items'))->sum('total');

        // Find the party related to the sale
        $party = AddParty::find($request->input('party_name'));

        // Check if the payment method is changing
        $oldPaymentMethod = $sale->payment_method;
        $newPaymentMethod = $request->input('payment_method');

        // Adjust the party's credit limit if switching from Cash to Credit
        if ($oldPaymentMethod === 'Cash' && $newPaymentMethod === 'Credit') {
            if ($party) {
                // Decrease credit limit by the sale total
                $party->credit_limit -= $totalAmount;

                if ($party->credit_limit < 0) {
                    return redirect()->back()->with('error', 'Credit limit exceeded for ' . $party->party_name);
                }

                $party->save();
            }
        } elseif ($oldPaymentMethod === 'Credit' && $newPaymentMethod === 'Cash') {
            // If switching from Credit to Cash, increase credit limit
            if ($party) {
                $party->credit_limit += $totalAmount;
                $party->save();
            }
        }

        // Update the sale record
        $sale->update($validated);

        // Handle item quantity updates (as in your previous code)
        // This will update the quantities and inventory based on the changes

        // Find the record in all_datas table using the party_name foreign key
        $allRecord = AllData::where('party_name', $request->input('party_name'))->first();

        if ($allRecord) {
            // Adjust cash/credit amounts based on the updated payment method
            if ($oldPaymentMethod === 'Cash' && $newPaymentMethod === 'Credit') {
                // Switching from Cash to Credit
                $allRecord->purchase_cash -= $sale->cash_details;
                $allRecord->purchase_credit += $totalAmount;
            } elseif ($oldPaymentMethod === 'Credit' && $newPaymentMethod === 'Cash') {
                // Switching from Credit to Cash
                $allRecord->purchase_credit -= $totalAmount;
                $allRecord->purchase_cash += $request->input('cash_details');
            }

            $allRecord->save();
        }

        // Return success response
        return redirect()->back()->with('success', 'Sale updated successfully!');
    }
}
