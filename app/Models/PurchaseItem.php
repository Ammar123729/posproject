<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'item_type', // This now refers to item_name
        'quantity',
        'price',
        'discount',
        'total',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
