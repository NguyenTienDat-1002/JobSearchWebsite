<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee_Account extends Authenticatable
{
    use HasFactory;
    protected $table="employee_account";
    protected $primaryKey='id';
    protected $fillable=['id','email','password'];
    public $timestamps = false;

}
