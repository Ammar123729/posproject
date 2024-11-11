<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllData extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'party_name',
        'sale_credit',
        'sale_cash',
        'purchase_credit',
        'purchase_cash',
        'sale_return',
        

    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function addItem(){
        return $this->hasMany(AddItem::class);
    }
}
