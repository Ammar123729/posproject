<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartyReport extends Controller
{
    public function allparty()
    {
        return view('partyreport.allparty');
    }
}
