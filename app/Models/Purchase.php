<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
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
        return $this->hasMany(PurchaseItem::class);
    }

    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }

    public function record()
    {
        return $this->hasMany(AllRecord::class);
    }

    public function alldata()
    {
        return $this->hasMany(AllData::class);
    }
}
