<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    //
    protected $fillable = [
        'user_id',
        'user_agent',
        'ip_address'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
