<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User_record extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_records';

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
    ];

    protected $primaryKey = 'id';

}