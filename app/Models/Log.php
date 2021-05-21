<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';
    protected $fillable = [
        'id' ,'user_id','wallet_id','log'
    ];
}
