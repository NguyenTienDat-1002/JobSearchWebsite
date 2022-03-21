<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $table="cv";
    protected $primaryKey="id";
    protected $guarded=[];
    public $timestamps = false;

    public function employee(){
        return $this->belongsTo('App\Models\Employee','employee_id','id');
    }
}
