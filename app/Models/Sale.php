<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'party_name',
        'phone_number',
        'invoice_number',
        'date',
        'payment_method',
        'cash_details',
        'status',
    ];

    protected $casts = [
        'date' => 'datetime',  // Automatically casts to Carbon instance
    ];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }

    public function alldata()
    {
        return $this->hasMany(AllData::class);
    }
}
