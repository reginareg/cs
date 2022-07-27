<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Invoice;
use App\Models\Paslauga;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }
    public function paslauga()
    {
        return $this->hasMany(Paslauga::class, 'user_id', 'id');
    }


    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}