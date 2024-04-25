<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoiceNumber',
        'invoiceDate',
        'customerName',
        'customerEmail',
        'customerPhone',
        'customerState',
        'subTotal',
        'quantity',
        'gstPercentage',
        'gstAmount',
        'grandTotal',
    ];

    protected $casts = [
        'subTotal' => 'float',
        'gstAmount' => 'float',
        'grandTotal' => 'float',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
