<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table="city";
    protected $primaryKey="id";

    public function posts(){
        return $this->hasMany('App\Models\Post','city_id','id');
    }
}