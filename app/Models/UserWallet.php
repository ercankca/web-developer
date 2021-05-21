<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    protected $table = 'user_wallets';
    protected $fillable = [
        'id' ,'user_id','wallet_id','amount'
    ];

    public function User()
    {
        return $this->hasOne(User::class,"id","user_id");
    }

    public function Wallet()
    {
        return $this->hasOne(Wallet::class,"id","wallet_id");
    }

}
