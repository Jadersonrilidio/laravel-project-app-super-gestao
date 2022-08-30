<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Dictates the referenced database table name related to this model.
     * 
     * @var string
     * 
     */
    protected $table = 'products';

    /**
     * Allow the following table fields named in array to be autocompleted by Eloquent engine.
     * 
     * @var array
     * 
     */
    protected $fillable = ['name', 'description', 'supplier_id', 'weight', 'unit_id'];

    /**
     * 
     */
    public function productDetail()
    {
        return $this->hasOne('App\Models\ProductDetail');
    }

    /**
     * 
     */
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }

    /**
     * 
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_products', 'product_id', 'order_id')->withPivot('id', 'created_at', 'quantity');
    }
}
