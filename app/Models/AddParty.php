<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddParty extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'party_name',
        'phone',
        'email',
        'address',
        'opening_balance',
        'date',
        'credit_limit',
        'fieldone',
        'fieldtwo'
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'party_name');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'party_name');
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function allData()
    {
        return $this->hasMany(AllData::class, 'party_name');
    }

    public function paymentIn()
    {
        return $this->hasMany(SalePaymentIn::class);
    }

    public function paymentOut()
    {
        return $this->hasMany(PurchasePaymentOut::class);
    }
}
