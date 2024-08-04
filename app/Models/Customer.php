<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    //it  is use dor disabling timestamps that i didnt even use
    public $timestamps = false;

    protected $fillable = ['name', 'phone_number'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}