<?php

namespace App\Http\Controllers;

use App\Models\AddParty;
use App\Models\Reminder;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'party_name' => 'required',
            'reminder' => 'required',
            'reminder_date' => 'required|date',
        ]);

        $party = AddParty::where('party_name', $request->party_name)->first();

        Reminder::create([
            'party_name' => $party->id,
            'reminder' => $request->reminder,
            'reminder_date' => $request->reminder_date,
        ]);

        return redirect()->back()->with('success', 'Reminder added successfully!');
    }
}
