<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = [
        'city',
        'state',
        'group_city_id'
    ];

    public function groupCity(){
        return $this->hasOne(GroupCity::class);
    }
}
