<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    public $timestamps = false;
    
    protected $table = 'tblauthors';

    protected $fillable = [
        'id','fullname','gender', 'birthday',
    ];

    protected $primaryKey = 'id';
}
