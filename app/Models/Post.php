<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;
    protected $table="post";
    protected $primaryKey="id";
    protected $guarded=[];
    public $timestamps = false;

    public function city(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level','level_id','id');
    }
    protected static function booted(){
        static::addGlobalScope('available', function($builder){
            return $builder->where('end_date','>',now());
        });
        static::addGlobalScope('checked',function($builder){
            return $builder->where('status',1);
       });
    }

    
}
