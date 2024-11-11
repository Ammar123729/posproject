<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'item_type', // This now refers to item_name
        'quantity',
        'price',
        'discount',
        'total',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }

    public function allData()
    {
        return $this->belongsTo(AllData::class);
    }
}
