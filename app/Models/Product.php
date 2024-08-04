<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name', 'price', 'description', 'category_id', 'customer_id', 'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}