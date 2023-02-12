<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionHeader extends Model
{
    use HasFactory;

    protected $fillable = ['document_code',
        'document_number',
        'user',
        'total',
    ];

}
