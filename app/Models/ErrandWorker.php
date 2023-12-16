<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ErrandWorker extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'errand_workers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'avatar',
        'identification_card',
        'account_balance'
    ];

    public function scopeSearch($query){
        if($s = request()->s){
            $query = $query->where('name','like',"%".$s ."%")->orWhere('email','like',"%".$s."%")->orWhere('phone','like',"%".$s."%");
        }
        return $query;
    }

}
