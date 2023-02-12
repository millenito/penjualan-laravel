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

    public function details()
    {
        return $this->hasMany('App\Models\transactionDetail', 'document_number', 'document_number');

    }

    public function usernya()
    {
        return $this->belongsTo('App\Models\User', 'user', 'id');
    }
}
