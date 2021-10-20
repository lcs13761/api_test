<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCity extends Model
{
    use HasFactory;

    protected $table = 'group_cities';
    protected $fillable = [
        'group_name',
        'campaign_id'
    ];


    public function campaign(){
        return $this->hasOne(Campaign::class);
    }

    public function city(){
        return $this->hasMany(City::class);
    }

}
