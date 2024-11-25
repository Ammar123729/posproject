<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemStockReport extends Controller
{
    public function item_party()
    {
        return view('itemstockreport.itemparty');
    }

    public function stock_summary()
    {
        return view('itemstockreport.stocksummary');
    }

    public function item_detail()
    {
        return view('itemstockreport.itemdetail');
    }

    public function item_wise_discount()
    {
        return view('itemstockreport.itemwisediscount');
    }

    public function item_wise_profit_loss()
    {
        return view('itemstockreport.itemwiseprofitloss');
    }

    public function low_stock_summary()
    {
        return view('itemstockreport.lowstocksummary');
    }

    public function sale_purchase_report_item()
    {
        return view('itemstockreport.salepurchasereportitem');
    }

    public function stock_detail()
    {
        return view('itemstockreport.stockdetail');
    }
}
