<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePaymentOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'party_name',
        'purchase_credit',
        'purchase_cash',
        'add_payment',
        'date',
    ];

    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }
}
