<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryHistory extends Model
{
    use HasFactory;
    protected $table = 'grocery_history';
    protected $fillable = ['id', 'tanggal', 'itemID', 'price', 'unit', 'quantity', 'created_at', 'updated_at', 'item_name'];
}
