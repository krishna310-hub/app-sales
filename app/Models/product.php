<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'cid',
        'product_name',
        'qty',
        'rate',
        'gst'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cid');
    }
}
