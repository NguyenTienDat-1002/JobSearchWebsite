<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employer_Account extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table="employer_account";
    protected $primaryKey="id";
    protected $fillable=['id','email','password'];
    public $timestamps = false;
}
