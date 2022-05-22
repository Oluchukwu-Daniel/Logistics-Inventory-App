<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'name',
        'image',
        'weight',
        'colour',
        'qty',
        'pickup',
        'destination',
        'warehouse',
        'transportation_mode',
        'status',
        'pickup_date',
        'delivery_date',
    ];


    //Relationship with Comments
    public function comments(){

        return $this->hasMany(Comments::class, 'inventory_id');
    }
    //comments(); = Inventory Model has many comments in the Comment model and the identifier in the Comment model is the inventory_id column.
}
