<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaign';
    protected $fillable = [
        'campaign_name',
        'campaign_objective'
    ];

    public function groupCity(){
        return $this->hasMany(GroupCity::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

}
