<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sale_credit',
        'sale_cash',
        'purchase_credit',
        'purchase_cash',
        'party_name',
    ];  

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function party()
    {
        return $this->belongsTo(AddParty::class);
    }
}
