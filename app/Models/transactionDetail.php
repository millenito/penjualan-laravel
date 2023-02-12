<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['document_code',
        'document_number',
        'product_code',
        'price',
        'quantity',
        'unit',
        'subtotal',
        'currency',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\product', 'product_code', 'product_code');
    }
}
