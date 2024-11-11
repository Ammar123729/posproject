<?php

namespace App\Http\Controllers;

use App\Models\AddCategory;
use App\Models\AddItem;
use App\Models\AddParty;
use App\Models\AddUnit;
use App\Models\AllData;
use App\Models\ItemData;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Reminder;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SalePaymentIn;
use App\Models\SaleReturn;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PartyController extends Controller
{
    public function party_detail(Request $request)
    {
        $selectparty = null;
        $purchasedata = [];
        $seconddata = [];
        if ($request->has('party_id')) {
            $partyId = $request->party_id;
            $selectparty = AddParty::find($partyId);

            $purchasedata = Sale::where('party_name', $partyId)->with('items')->get();

            $seconddata = Purchase::where('party_name', $partyId)->with('items')->get();
        }
        $getparty = AddParty::all();
        $notifications = Reminder::all();
        return view('partydetail.partydetail', compact('getparty', 'selectparty', 'purchasedata', 'seconddata', 'notifications'));
    }

    //Add Party 

    public function add_party(Request $request)
    {
        // $request->validate([
        //     'party_name' => '',
        //     'phone' => '',
        //     'email' => '',
        //     'address' => '',
        //     'date' => '',

        // ]);
        $party = new AddParty();
        $party->party_name = $request->input('party_name');
        $party->phone = $request->input('phone');
        $party->email = $request->input('email');
        $party->address = $request->input('address');
        $party->opening_balance = $request->input('opening_balance');
        $party->date = $request->input('date');
        $party->credit_limit = $request->input('credit_limit');
        $party->fieldone = $request->input('fieldone');
        $party->fieldtwo = $request->input('fieldtwo');
        $party->save();
        return redirect()->back()->with('success', 'Party add SuccessFully');
    }

    public function item_page()
    {
        $getunit = AddUnit::all();
        $getcate = AddCategory::all();
        return view('partydetail.itempage', compact('getcate', 'getunit'));
    }
    public function get_item(Request $request)
    {
        $selectitem = null;
        $saleData = [];
        $purchaseData = [];

        if ($request->has('item_id')) {
            $itemId = $request->item_id;

            // Find the item by ID
            $selectitem = AddItem::find($itemId);

            // Fetch SaleItem records and related Sale data
            $saleData = SaleItem::where('item_type', $itemId)->get()->map(function ($item) {
                return $item->sale; // Get related Sale data
            });

            // Fetch PurchaseItem records and related Purchase data
            $purchaseData = PurchaseItem::where('item_type', $itemId)->get()->map(function ($item) {
                return $item->purchase; // Get related Purchase data
            });
        }

        $getallitem = AddItem::all();

        return view('partydetail.additem', compact('getallitem', 'selectitem', 'saleData', 'purchaseData'));
    }


    //Add Unit

    public function add_unit(Request $request)
    {
        $additemvalidate = $request->validate([
            'unitone' => 'required|string|max:255',
            'unittwo' => 'required'
        ]);

        AddUnit::create($additemvalidate);

        return redirect()->back()->with('success', 'Store Unit');
    }

    //Add Categorry

    public function add_category(Request $request)
    {

        $addcate = $request->validate([
            'category_name' => 'required'
        ]);
        AddCategory::create($addcate);
        return redirect()->back()->with('success', 'Add Category');
    }

    //AddItem

    public function add_item(Request $request)
    {
        $additem = new AddItem();
        $additem->item_name = $request->input('item_name');
        $additem->item_category = $request->input('item_category');
        if ($request->hasFile('item_image')) {
            $file = $request->file('item_image');
            $filename = time() . '_' . $file->getClientOriginalName(); // Create a unique filename
            $path = $file->storeAs('public/images', $filename); // Save the file to the 'public/images' directory

            // Save the file path in the database
            $additem->item_image = $filename;
        } else {
            $additem->item_image = null; // Handle the case when no image is uploaded
        }
        $additem->item_code = $request->input('item_code');
        $additem->item_unit = $request->input('item_unit');
        $additem->item_saleprice = $request->input('item_saleprice');
        $additem->item_purchaseprice = $request->input('item_purchaseprice');
        $additem->item_date = $request->input('item_date');
        $additem->item_quantity = $request->input('item_quantity');
        $additem->item_quantityprice = $request->input('item_quantityprice');
        $additem->item_minimumstock = $request->input('item_minimumstock');
        $additem->item_address = $request->input('item_address');
        $additem->item_credit = $request->input('item_credit');

        $additem->save();
        return redirect()->route('get.item')->with('success', 'item Stored');
    }
    // public function get_inv()
    // {
    //     // Fetch sales and group them by party_name
    //     $sales = Sale::with('items')
    //         ->orderBy('party_name')  // Order by party name for better grouping in the view
    //         ->with('party')
    //         ->get()
    //         ->groupBy('party_name');

    //     // Prepare totals for each party
    //     $partyTotals = [];
    //     foreach ($sales as $partyName => $partySales) {
    //         $totalAmount = 0;
    //         $totalCredit = 0;
    //         $RemainingBlance = 0;
    //         foreach ($partySales as $sale) {
    //             foreach ($sale->items as $item) {
    //                 $totalAmount += $item->total;
    //                 if ($sale->payment_method === 'Credit') {
    //                     $totalCredit += $item->total;
    //                 }
    //             }
    //         }

    //         $partyTotals[$partyName] = [
    //             'totalAmount' => $totalAmount,
    //             'totalCredit' => $totalCredit,
    //             'RemainingBlance' => $totalAmount - $totalCredit,
    //         ];
    //     }

    //     // Calculate total amount for cash sales
    //     $cashTotal = Sale::where('payment_method', 'cash')
    //         ->join('sale_items', 'sales.id', '=', 'sale_items.sale_id')
    //         ->sum('sale_items.total');

    //     // Calculate total amount for credit sales
    //     $creditTotal = Sale::where('payment_method', 'credit')
    //         ->join('sale_items', 'sales.id', '=', 'sale_items.sale_id')
    //         ->sum('sale_items.total');

    //     $totalamnt = $cashTotal + $creditTotal;
    //     return view('sale.saleinv', compact('sales', 'partyTotals', 'cashTotal', 'creditTotal', 'totalamnt'));
    // }

    public function get_inv(Request $request)
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

        return view('sale.saleinv', compact('sales', 'partyTotals', 'cashTotal', 'creditTotal', 'totalamnt'));
    }

    // public function generatePdf(Request $request)
    // {
    //     $start = $request->input('start');
    //     $end = $request->input('end');

    //     // Fetch the same filtered records
    //     $sales = Sale::whereBetween('created_at', [$start, $end])->get();

    //     // Generate PDF
    //     $pdf = Pdf::loadView('sale.pdf', compact('sales'));

    //     return $pdf->download('sales_report.pdf');
    // }
    public function generatePdf(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        // Fetch the sales with related party data using Eager Loading
        $sales = Sale::with('party')->whereBetween('created_at', [$start, $end])->get();

        // Generate PDF
        $pdf = Pdf::loadView('sale.pdf', compact('sales'));

        return $pdf->download('sales_report.pdf');
    }



    // public function sale_pay()
    // {
    //     $alldata = AllData::all();
    //     $salepaymntin = SalePaymentIn::all();
    //     return view('sale.payment', compact('alldata', 'salepaymntin'));
    // }
    public function sale_pay(Request $request)
    {
        $query = SalePaymentIn::query();

        if ($request->has('start') && $request->has('end')) {
            $startDate = $request->input('start');
            $endDate = $request->input('end');

            // Filter records by date range
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $salepaymntin = $query->get();
        $alldata = AllData::all();

        return view('sale.payment', compact('alldata', 'salepaymntin'));
    }

    public function sale_paystore(Request $request)
    {
        // Validate the request data
        $validate = $request->validate([
            'party_name' => 'required|integer|exists:add_parties,id',
            'sale_credit' => 'required',
            'sale_cash' => 'required',
            'add_payment' => 'required|integer',
            'date' => 'required|date'
        ]);

        // Find the relevant record in AllData based on party_name
        $allDataRecord = AllData::where('party_name', $request->party_name)->first();

        if ($allDataRecord) {
            // Subtract the add_payment from sale_credit
            $allDataRecord->sale_credit -= $request->add_payment;
            // Save the changes to AllData
            $allDataRecord->save();

            // Store the payment in SalePaymentIn table
            SalePaymentIn::create([
                'party_name' => $request->party_name,
                'sale_credit' => $request->sale_credit,
                'sale_cash' => $request->sale_cash,
                'add_payment' => $request->add_payment,
                'date' => $request->date,
            ]);

            return redirect()->back()->with('success', 'Payment stored successfully.');
        }
    }

    public function sale_order()
    {
        return view('sale.order');
    }

    public function sale_retrun(Request $request)
    {
        $query = SaleReturn::query();

        if ($request->has('start') && $request->has('end')) {
            $startDate = $request->input('start');
            $endDate = $request->input('end');

            // Filter records by date range
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $salepaymntin = $query->get();
        $returndata = SaleReturn::all();
        return view('sale.return', compact('returndata'));
    }

    public function sale_item()
    {
        $allparty = AddParty::all();
        $allitems = AddItem::all();
        return view('sale.saleitem', compact('allparty', 'allitems'));
    }




    // public function item_store(Request $request)
    // {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'party_name' => 'required|integer|exists:add_parties,id',  // Validate foreign key party_name
    //         'phone_number' => 'nullable|string|max:20',
    //         'invoice_number' => 'nullable|string|max:50',
    //         'date' => 'nullable|date',
    //         'items.*.item_type' => 'required|exists:add_items,id',
    //         'items.*.quantity' => 'required|integer|min:1',
    //         'items.*.price' => 'required|numeric|min:0',
    //         'items.*.discount' => 'nullable|numeric|min:0|max:100',
    //         'items.*.total' => 'required|numeric|min:0',
    //         'payment_method' => 'required|in:Cash,Credit',
    //         'cash_details' => 'nullable|numeric|min:0',  // To store cash details (amount)
    //     ]);

    //     // Calculate total sale amount
    //     $totalAmount = collect($request->input('items'))->sum('total');

    //     // Find the party by ID
    //     $party = AddParty::find($request->input('party_name'));

    //     if (!$party) {
    //         return redirect()->back()->with('error', 'Party not found.');
    //     }

    //     // If payment method is "Credit", check the party's credit limit
    //     if ($request->input('payment_method') === 'Credit') {
    //         if ($totalAmount > $party->credit_limit) {
    //             return redirect()->back()->with('error', 'Credit limit exceeded for ' . $party->party_name);
    //         }

    //         // Deduct the total amount from the party's credit limit
    //         $party->credit_limit -= $totalAmount;
    //         $party->save();
    //     }

    //     // Create the sale record
    //     $sale = Sale::create($validated);

    //     // Create sale items and update inventory
    //     foreach ($request->input('items') as $itemData) {
    //         $addItem = AddItem::find($itemData['item_type']);

    //         if (!$addItem) {
    //             return redirect()->back()->with('error', 'Item not found in inventory.');
    //         }

    //         // Adjust inventory
    //         $newQuantity = $addItem->item_quantity - $itemData['quantity'];
    //         if ($newQuantity < 0) {
    //             return redirect()->back()->with('error', 'Not enough stock for item ID ' . $itemData['item_type']);
    //         }

    //         // Update item quantity in the AddItem table
    //         $addItem->update(['item_quantity' => $newQuantity]);

    //         // Save sale item
    //         $sale->items()->create($itemData);
    //     }

    //     // Check if a record for the party already exists in the all_records table
    //     $allRecord = AllData::where('party_name', $party->id)->first();

    //     // Update or create the all_records entry based on payment method
    //     if ($allRecord) {
    //         if ($request->input('payment_method') === 'Cash') {
    //             $allRecord->sale_cash += $request->input('cash_details');
    //         } elseif ($request->input('payment_method') === 'Credit') {
    //             $allRecord->sale_credit += $totalAmount;  // No cash details for Credit
    //         }
    //         $allRecord->save();
    //     } else {
    //         // Create a new record if no existing entry found
    //         AllData::create([
    //             'party_name' => $party->id,
    //             'sale_cash' => $request->input('payment_method') === 'Cash' ? $request->input('cash_details') : null,
    //             'sale_credit' => $request->input('payment_method') === 'Credit' ? $totalAmount : null,
    //         ]);
    //     }

    //     // Return success response
    //     return redirect()->back()->with('success', 'Sale recorded successfully!');
    // }

    // public function item_store(Request $request)
    // {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'party_name' => 'required|integer|exists:add_parties,id',  // Validate foreign key party_name
    //         'phone_number' => 'nullable|string|max:20',
    //         'invoice_number' => 'nullable|string|max:50',
    //         'date' => 'nullable|date',
    //         'items.*.item_type' => 'required|exists:add_items,id',
    //         'items.*.quantity' => 'required|integer|min:1',
    //         'items.*.price' => 'required|numeric|min:0',
    //         'items.*.discount' => 'nullable|numeric|min:0|max:100',
    //         'items.*.total' => 'required|numeric|min:0',
    //         'payment_method' => 'required|in:Cash,Credit',
    //         'cash_details' => 'nullable|numeric|min:0',  // To store cash details (amount)
    //     ]);

    //     // Calculate total sale amount
    //     $totalAmount = collect($request->input('items'))->sum('total');

    //     // Find the party by ID
    //     $party = AddParty::find($request->input('party_name'));

    //     if (!$party) {
    //         return redirect()->back()->with('error', 'Party not found.');
    //     }

    //     // If payment method is "Credit", check the party's credit limit
    //     if ($request->input('payment_method') === 'Credit') {
    //         if ($totalAmount > $party->credit_limit) {
    //             return redirect()->back()->with('error', 'Credit limit exceeded for ' . $party->party_name);
    //         }

    //         // Deduct the total amount from the party's credit limit
    //         $party->credit_limit -= $totalAmount;
    //         $party->save();
    //     }

    //     // Create the sale record
    //     $sale = Sale::create($validated);

    //     // Create sale items, update inventory, and store/update sale_quantity in ItemData
    //     foreach ($request->input('items') as $itemData) {
    //         $addItem = AddItem::find($itemData['item_type']);

    //         if (!$addItem) {
    //             return redirect()->back()->with('error', 'Item not found in inventory.');
    //         }

    //         // Adjust inventory
    //         $newQuantity = $addItem->item_quantity - $itemData['quantity'];
    //         if ($newQuantity < 0) {
    //             return redirect()->back()->with('error', 'Not enough stock for item ID ' . $itemData['item_type']);
    //         }

    //         // Update item quantity in the AddItem table
    //         $addItem->update(['item_quantity' => $newQuantity]);

    //         // Save sale item
    //         $sale->items()->create($itemData);

    //         // Check if a record for this item and party already exists in ItemData
    //         $itemDataRecord = ItemData::where('party_name', $party->id)
    //             ->where('item_id', $itemData['item_type'])
    //             ->first();

    //         if ($itemDataRecord) {
    //             // Update the existing sale quantity if record exists
    //             $itemDataRecord->sale_quantity += $itemData['quantity'];
    //             $itemDataRecord->save();
    //         } else {
    //             // Create a new record in ItemData if none exists
    //             ItemData::create([
    //                 'party_name' => $party->id,
    //                 'item_id' => $itemData['item_type'],
    //                 'sale_quantity' => $itemData['quantity'],
    //             ]);
    //         }
    //     }

    //     // Check if a record for the party already exists in the all_records table
    //     $allRecord = AllData::where('party_name', $party->id)->first();

    //     // Update or create the all_records entry based on payment method
    //     if ($allRecord) {
    //         if ($request->input('payment_method') === 'Cash') {
    //             $allRecord->sale_cash += $request->input('cash_details');
    //         } elseif ($request->input('payment_method') === 'Credit') {
    //             $allRecord->sale_credit += $totalAmount;  // No cash details for Credit
    //         }
    //         $allRecord->save();
    //     } else {
    //         // Create a new record if no existing entry found
    //         AllData::create([
    //             'party_name' => $party->id,
    //             'sale_cash' => $request->input('payment_method') === 'Cash' ? $request->input('cash_details') : null,
    //             'sale_credit' => $request->input('payment_method') === 'Credit' ? $totalAmount : null,
    //         ]);
    //     }

    //     // Return success response
    //     return redirect()->back()->with('success', 'Sale recorded successfully!');
    // }
    public function item_store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'party_name' => 'required|integer|exists:add_parties,id',
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

        try {
            // Calculate total sale amount
            $totalAmount = collect($request->input('items'))->sum('total');

            // Find the party by ID
            $party = AddParty::find($request->input('party_name'));

            if (!$party) {
                return response()->json(['success' => false, 'message' => 'Party not found.'], 400);
            }

            // Check Credit Limit
            if ($request->input('payment_method') === 'Credit') {
                if ($totalAmount > $party->credit_limit) {
                    return response()->json(['success' => false, 'message' => 'Credit limit exceeded for ' . $party->party_name], 400);
                }
                $party->credit_limit -= $totalAmount;
                $party->save();
            }

            // Create the sale record
            $sale = Sale::create($validated);

            foreach ($request->input('items') as $itemData) {
                $addItem = AddItem::find($itemData['item_type']);
                if (!$addItem) {
                    return response()->json(['success' => false, 'message' => 'Item not found in inventory.'], 400);
                }

                $newQuantity = $addItem->item_quantity - $itemData['quantity'];
                if ($newQuantity < 0) {
                    return response()->json(['success' => false, 'message' => 'Not enough stock for item ID ' . $itemData['item_type']], 400);
                }

                $addItem->update(['item_quantity' => $newQuantity]);
                $sale->items()->create($itemData);

                $itemDataRecord = ItemData::where('party_name', $party->id)
                    ->where('item_id', $itemData['item_type'])
                    ->first();

                if ($itemDataRecord) {
                    $itemDataRecord->sale_quantity += $itemData['quantity'];
                    $itemDataRecord->save();
                } else {
                    ItemData::create([
                        'party_name' => $party->id,
                        'item_id' => $itemData['item_type'],
                        'sale_quantity' => $itemData['quantity'],
                    ]);
                }
            }

            $allRecord = AllData::where('party_name', $party->id)->first();
            if ($allRecord) {
                if ($request->input('payment_method') === 'Cash') {
                    $allRecord->sale_cash += $request->input('cash_details');
                } elseif ($request->input('payment_method') === 'Credit') {
                    $allRecord->sale_credit += $totalAmount;
                }
                $allRecord->save();
            } else {
                AllData::create([
                    'party_name' => $party->id,
                    'sale_cash' => $request->input('payment_method') === 'Cash' ? $request->input('cash_details') : null,
                    'sale_credit' => $request->input('payment_method') === 'Credit' ? $totalAmount : null,
                ]);
            }
            // Log::info('PDF Data: ', $validated);
            // $pdf = PDF::loadView('sale.receipt', $validated);

            // // Download the PDF (or you could return it inline to the browser)
            // return $pdf->download('sale_receipt.pdf');
            $data = [
                'party' => $party,
                'phone_number' => $request->input('phone_number'),
                'invoice_number' => $request->input('invoice_number'),
                'date' => $request->input('date'),
                'payment_method' => $request->input('payment_method'),
                'cash_details' => $request->input('cash_details'),
                'items' => collect($request->input('items'))->map(function ($item) {
                    $item['item_name'] = \App\Models\AddItem::find($item['item_type'])->item_name; // Fetch item name based on item_type (item ID)
                    return $item;
                })->toArray(),
                'totalAmount' => $totalAmount,
            ];
            //     Log::info('PDF Data: ', $data);
            // $pdf = PDF::loadView('sale.receipt', $data)
            //     ->setPaper([0, 0, 270, 700], 'portrait');  // Set custom paper size for the receipt
            // return $pdf->download('receipt.pdf');
            return view('sale.receipt', $data);

            // Return success response
          return response()->json(['success' => true, 'message' => 'Sale recorded successfully!']);
    } catch (\Exception $e) {
        Log::error('Error processing request: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'An error occurred while processing your request.'], 500);
    }
}

//print
public function generatePDFsale($id)
{
    // Fetch sale data based on invoice ID
    // You might want to modify this based on how you store your sales
    $sale = Sale::findOrFail($id); // Assuming you are storing invoice_number as ID

    // Prepare data for PDF
    $data = [
        'party' => $sale->party,
        'phone_number' => $sale->phone_number,
        'invoice_number' => $sale->invoice_number,
        'date' => $sale->date,
        'payment_method' => $sale->payment_method,
        'cash_details' => $sale->cash_details,
        'items' => $sale->items,
        'totalAmount' => $sale->items->sum('total'), // Assuming items have a total field
    ];

    $pdf = PDF::loadView('sale.receipt', $data)->setPaper('a4', 'portrait');
    return $pdf->download('receipt.pdf');
}



    //Sale Edit
    public function sale_edit($id)
    {
        $sale = Sale::with('items')->findOrFail($id);
        $allitems = AddItem::all();
        $allparty = AddParty::all();
        return view('sale.edit', compact('sale', 'allitems', 'allparty'));
    }

    public function sale_update(Request $request, $id)
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
        $sale = Sale::find($id);

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
                $allRecord->sale_cash -= $sale->cash_details;
                $allRecord->sale_credit += $totalAmount;
            } elseif ($oldPaymentMethod === 'Credit' && $newPaymentMethod === 'Cash') {
                // Switching from Credit to Cash
                $allRecord->sale_credit -= $totalAmount;
                $allRecord->sale_cash += $request->input('cash_details');
            }

            $allRecord->save();
        }

        // Return success response
        return redirect()->back()->with('success', 'Sale updated successfully!');
    }

    public function item_return()
    {
        $allparty = AddParty::all();
        $allitems = AddItem::all();
        return view('sale.itemreturn', compact('allparty', 'allitems'));
    }

    public function return_item(Request $request)
    {
        $request->validate([
            'party_name' => 'required|exists:add_parties,id',
            'item_id' => 'required|array',
            'return_quantity' => 'required|array',
            'return_payment' => 'required|array',
            'return_quantity.*' => 'integer|min:1',
            'return_payment.*' => 'numeric|min:0',
        ]);

        $partyId = $request->input('party_name');
        $itemIds = $request->input('item_id');
        $returnQuantities = $request->input('return_quantity');
        $returnPayments = $request->input('return_payment');

        $totalValue = 0; // Initialize total value

        foreach ($itemIds as $index => $itemId) {
            $returnQuantity = $returnQuantities[$index];
            $returnPayment = $returnPayments[$index];

            // Calculate total value for the current item return
            $totalValue += $returnQuantity * $returnPayment;

            // Reduce the sale quantity in ItemData
            $itemData = new ItemData();
            $success = $itemData->reduceQuantityOnReturn($partyId, $itemId, $returnQuantity);

            if ($success) {
                // Create a new sale return record
                SaleReturn::create([
                    'party_name' => $partyId,
                    'item_id' => $itemId,
                    'return_quantity' => $returnQuantity,
                    'return_payment' => $returnPayment,
                ]);
            } else {
                return redirect()->back()->with('error', 'Error processing sale return. Not enough quantity.');
            }
        }

        // Update the AllData table
        $allData = AllData::where('party_name', $partyId)->first(); // Adjust based on how you identify the record
        if ($allData) {
            // Update sale_return and adjust sale_credit
            $allData->sale_return += $totalValue; // Increment sale_return
            $allData->sale_credit -= $totalValue; // Decrement sale_credit
            $allData->save();
        }

        return redirect()->back()->with('success', 'Sale returns processed successfully!');
    }
}
