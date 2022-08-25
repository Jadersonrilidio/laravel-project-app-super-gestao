<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    
    /**
     * Dictates the referenced database table name related to this model.
     * 
     * @var string
     * 
     */
    protected $table = 'units';

    /**
     * Allow the following table fields named in array to be autocompleted by Eloquent engine.
     * 
     * @var array
     * 
     */
    protected $fillable = ['unit', 'description'];
}
