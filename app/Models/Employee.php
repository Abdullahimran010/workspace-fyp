<?php

namespace App\Models;
use App\Models\Joinevent;
use App\Models\Mynotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = ['emp_id', 'name', 'email', 'password', 'avatar', 'rank', 'status', 'points', 'fcm_token', 'verification_code', 'is_verified','remember_token'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}


