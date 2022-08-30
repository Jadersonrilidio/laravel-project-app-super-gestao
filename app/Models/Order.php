<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Dictates the referenced database table name related to this model.
     * 
     * @var string
     */
    protected $table = 'orders';

    /**
     * Allow the following table fields named in array to be autocompleted by Eloquent engine.
     * 
     * @var array
     */
    protected $fillable = ['client_id'];

    /**
     * 
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * 
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_products', 'order_id', 'product_id')->withPivot('id', 'created_at', 'quantity');
    }
}
