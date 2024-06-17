<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    use HasFactory;
    protected $table = 'grocery_items';
    protected $fillable = ['id', 'item_name', 'isChecked', 'created_at', 'updated_at'];
}
