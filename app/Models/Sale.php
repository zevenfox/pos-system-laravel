<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        // Add any additional fields as needed
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_sale')->withPivot('quantity');
    }

    // Override the attach method to include the item_id
    public function attach($item_id, $attributes = [], $touch = true)
    {
        $attributes = array_merge($attributes, ['item_id' => $item_id]);
        return parent::attach($item_id, $attributes, $touch);
    }

}

