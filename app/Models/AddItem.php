<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'item_name',
        'item_category',
        'item_image',
        'item_code',
        'item_unit',
        'item_saleprice',
        'item_purchaseprice',
        'item_date',
        'item_quantity',
        'item_quantityprice',
        'item_minimumstock',
        'item_address',
        'item_credit',
    ];

    public function itemData()
    {
        return $this->belongsTo(ItemData::class);
    }

    public static function getLowStockItems($threshold)
    {
        return self::where('item_quantity', '<', $threshold)->get();
    }
}
