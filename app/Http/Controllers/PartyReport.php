<?php

namespace App\Http\Controllers;

use App\Models\AddParty;
use Illuminate\Http\Request;

class PartyReport extends Controller
{
    public function allparty()
    {
        $allparty = AddParty::all();
        return view('partyreport.allparty', compact('allparty'));
    }
}
