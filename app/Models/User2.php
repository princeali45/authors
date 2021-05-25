<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    public $timestamps = false;
    
    protected $table = 'user2s';

    protected $fillable = [
        'username','password'
    ];

    protected $primaryKey = 'id';
}
