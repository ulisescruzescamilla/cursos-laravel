<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'bar_code',
        'sku'
    ];

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }
}
