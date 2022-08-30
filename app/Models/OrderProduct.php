<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    /**
     * Dictates the referenced database table name related to this model.
     * 
     * @var string
     */
    protected $table = 'order_products';

    /**
     * Allow the following table fields named in array to be autocompleted by Eloquent engine.
     * 
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    /**
     * 
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'order_id', 'id');
    }

    /**
     * 
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'product_id', 'id');
    }
}
