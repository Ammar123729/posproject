<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'party_name',
        'item_id',
        'return_quantity',
        'return_payment',
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
