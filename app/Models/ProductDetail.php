<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    /**
     * 
     */
    protected $table = 'product_details';

    /**
     * 
     */
    protected $fillable = ['product_id', 'length', 'width', 'height', 'unit_id'];

    /**
     * 
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
