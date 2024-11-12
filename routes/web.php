<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashBnakController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransctionController;
use App\Http\Controllers\UserController;
use App\Models\AddItem;
use App\Models\Expenses;
use App\Models\PurchasePaymentOut;
use App\Models\Sale;
use App\Models\SalePaymentIn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::resource('permissions', [PermissionController::class]);
Route::group(['middleware' => ['role:super-admin|admin']], function () {


    Route::get('permissions', [PermissionController::class, 'index']);
    Route::get('permissions/create', [PermissionController::class, 'create']);
    Route::post('permissions/store', [PermissionController::class, 'store']);
    Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit']);
    Route::put('permissions/{permission}/update', [PermissionController::class, 'update']);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'delete']);

    //Role
    Route::get('roles', [RoleController::class, 'index']);
    Route::get('roles/create', [RoleController::class, 'create']);
    Route::post('roles/store', [RoleController::class, 'store']);
    Route::get('roles/{role}/edit', [RoleController::class, 'edit']);
    Route::put('roles/{role}/update', [RoleController::class, 'update']);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'delete']);
    //assign role to permission
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    //Create A Users
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/create', [UserController::class, 'create']);
    Route::post('users/store', [UserController::class, 'store']);
    Route::get('users/{user}/edit', [UserController::class, 'edit']);
    Route::put('users/{user}/update', [UserController::class, 'update']);
    Route::get('users/{userId}/delete', [UserController::class, 'delete']);
});

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('loginstore', [AuthController::class, 'loginstore']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function (Request $request) {
    $today = Carbon::today();
    $month = $request->input('month');
    $year = $request->input('year');

    $totalcash = 0;
    $paymetcash = Sale::where('payment_method', 'Cash')->whereDate('date', $today)->get();
    $paymentcredit = Sale::where('payment_method', 'Credit')->whereDate('date', $today)->get();
    $totalcashpay = $paymetcash->sum('cash_details');
    $totalcreditpay = $paymentcredit->sum('cash_details');

    //today mothly yearly cash_details

    if ($request->isMethod('get')  || ($month === null && $year === null)) {
        $totalcash = Sale::whereDate('date', $today)->sum('cash_details');
    }

    if ($month) {
        $totalcash = Sale::whereMonth('date', $month)->sum('cash_details');
    }

    if ($year) {
        $totalcash = Sale::whereYear('date', $year)->sum('cash_details');
    }
    // select the data you will pay

    $selectdata = SalePaymentIn::all();

    $purchasedata = PurchasePaymentOut::all();

    $stockvalue = AddItem::sum('item_saleprice');
    $threshold = $request->input('threshold', 0); // Get threshold value from request or use default
    $lowStockItems = AddItem::getLowStockItems($threshold);


    $expen = Expenses::sum('amount');
    return view('dashboard.index', compact('expen', 'lowStockItems', 'stockvalue', 'purchasedata', 'selectdata', 'totalcashpay', 'totalcreditpay', 'totalcash', 'month', 'year'));
})->middleware('permission:dashboard');
Route::get('/partydetail', [PartyController::class, 'party_detail'])->name('party.detail')->middleware('permission:parties-details');
Route::get('/getitem', [PartyController::class, 'get_item'])->name('get.item')->middleware('permission:items');
Route::post('addparty', [PartyController::class, 'add_party'])->name('add.party');
Route::post('item', [PartyController::class, 'add_unit'])->name('item');
Route::post('addcategory', [PartyController::class, 'add_category'])->name('add.category');
Route::post('additem', [PartyController::class, 'add_item'])->name('add.item');
Route::get('itempage', [PartyController::class, 'item_page'])->name('item.page');
/* Sale Route's */
Route::get('/saleinv', [PartyController::class, 'get_inv'])->name('sale.inv')->middleware('permission:sale-invoice');
Route::get('/salepayment', [PartyController::class, 'sale_pay'])->name('sale.payment')->middleware('permission:sale-payment-inout');
Route::get('/saleorder', [PartyController::class, 'sale_order'])->name('sale.order');
Route::get('/saleretrun', [PartyController::class, 'sale_retrun'])->name('sale.retrun')->middleware('permission:sale-return');
Route::get('saleitem', [PartyController::class, 'sale_item'])->name('sale.item');
Route::post('itemstore', [PartyController::class, 'item_store'])->name('item.store');
Route::post('/salepay', [PartyController::class, 'sale_paystore'])->name('sale.pay');
Route::get('returnitem', [PartyController::class, 'item_return'])->name('return.item');
Route::post('saleitemreturn', [PartyController::class, 'return_item'])->name('sale.item.return');
Route::get('/sale/inv/pdf', [PartyController::class, 'generatePdf'])->name('sale.inv.pdf');
Route::get('/receipt/pdf/{id}', [PartyController::class, 'generatePDFsale'])->name('receipt.pdf');
/* Purchase Route's */

Route::get('purchasebill', [PurchaseController::class, 'purchase_bill'])->name('purchase.bill')->middleware('permission:purchase-bill');
Route::get('purchasepayment', [PurchaseController::class, 'pur_pay'])->name('purchase.payment')->middleware('permission:purchase-payment-inout');
Route::get('purchaseorder', [PurchaseController::class, 'pur_order'])->name('purchase.order');
Route::get('purchaseretrun', [PurchaseController::class, 'pur_retrun'])->name('purchase.retrun')->middleware('permission:purchase-return');
Route::get('purchaseitem', [PurchaseController::class, 'pur_item'])->name('purchase.item');
Route::post('purchasestore', [PurchaseController::class, 'pur_store'])->name('purchase.store');
Route::post('paymentpay', [PurchaseController::class, 'payemnt_pay'])->name('payment.pay');
Route::get('purchaseitemretrun', [PurchaseController::class, 'purchase_retrun'])->name('purchase.item.retrun');
Route::post('purchaseretrunitem', [PurchaseController::class, 'purchase_item_retrun'])->name('purchase.retrun.item');
/* Cash Bnak */

Route::get('cashinhand', [CashBnakController::class, 'cash_hand'])->name('cash.in.hand')->middleware('permission:cash-in-hand');
Route::get('bankdetail', [CashBnakController::class, 'bank_detail'])->name('bank.detail')->middleware('permission:bank-account');
// Sale routes
Route::get('sales/{id}/edit', [PartyController::class, 'sale_edit'])->name('sales.edit');
Route::put('sales/{id}', [PartyController::class, 'sale_update'])->name('sales.update');

// Purchase routes
Route::get('purchases/{id}/edit', [PurchaseController::class, 'pur_edit'])->name('purchases.edit');
Route::put('purchases/{id}', [PurchaseController::class, 'pur_update'])->name('purchases.update');

//Expenses

Route::get('expenses', [ExpensesController::class, 'expenses'])->name('expenses')->middleware('permission:expenses');
Route::post('expensesstore', [ExpensesController::class, 'ex_store'])->name('expenses.store');
//Login and signup

// Route::get('/', [AuthController::class, 'login'])->name('login');
// Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
// Route::post('loginstore', [AuthController::class, 'loginstore'])->name('login.store');
// Route::post('signupstore', [AuthController::class, 'signupstore'])->name('signup.store');
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('profileupdate', [AuthController::class, 'profile_update'])->name('profile.update');

//Notification Controller

Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
Route::get('/saleinvreport', [TransctionController::class, 'get_invreport'])->name('sale.invreport');
Route::get('/purchasereport', [TransctionController::class, 'purchase_report'])->name('purchase.report');
