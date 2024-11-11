<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'party_name',
        'item_id',
        'purchase_quantity',
        'return_payment',
        'total_payment',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',  // Automatically casts to Carbon instance
    ];
    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }
    public function addItem()
    {
        return $this->belongsTo(AddItem::class, 'item_id');
    }
}
