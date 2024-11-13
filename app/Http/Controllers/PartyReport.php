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
        return view('partyreport.partyreportitem');
    }

    public function sale_purchaseparty()
    {
        return view('partyreport.salepurchaseparty');
    }
}
