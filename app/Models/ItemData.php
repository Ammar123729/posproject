<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemData extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'party_name',
        'item_id',
        'sale_quantity',
        'purchase_quantity',
    ];

    public function party()
    {
        return $this->belongsTo(AddParty::class, 'party_name');
    }
    public function addItem()
    {
        return $this->hasMany(AddItem::class);
    }

    public function reduceQuantityOnReturn($partyId, $itemId, $returnQuantity)
    {
        // Find the record matching party and item
        $itemData = self::where('party_name', $partyId)
            ->where('item_id', $itemId)
            ->first();

        if ($itemData && $itemData->sale_quantity >= $returnQuantity) {
            $itemData->sale_quantity -= $returnQuantity;
            $itemData->save();
            return true; // Success
        }
        return false; // Failure
    }
}
