<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';
    protected $fillable = [
        'name_product',
        'campaign_id',
        'value_product',
        'discount_id'
    ];

    public function discount(){
        return $this->hasOne(Discount::class);
    }

    public function campaign(){
        return $this->hasOne(Campaign::class);
    }
}
