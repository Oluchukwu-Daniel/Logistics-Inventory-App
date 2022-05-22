<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'comment'

    ];
    protected $primaryKey = 'id';

    //Relationship with inventory
    public function inventory(){
        return $this->belongsTo(Inventory::class, 'inventory_id');

    }
    //inventory(); = Comments Model belongs to an inventory in the Inventory model and the inventory identifier is in the inventory_id column.
}
