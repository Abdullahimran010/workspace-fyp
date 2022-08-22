<?php

namespace App\Models;

//use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Facades\Image;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'isAdmin', 'status', 'avatar', 'privilege'];

//    public function sendPasswordResetNotification($token)
//    {
//        $this->notify(new AdminResetPasswordNotification($token));
//    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarPath($size = 'sm')
    {
        if ($this->avatar && file_exists('storage/' . $this->avatar))
            return asset('storage/'.$this->avatar);
        else
            return asset('assets/images/user/user.png');
    }

    public function updateAvatar()
    {
        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
            $dir = public_path('storage/images/admins/'. $this->id);
            if (!file_exists($dir)) mkdir($dir, 0777, true);
            if(request()->hasfile('avatar')){
                $file_path = request()->file('avatar')->store($dir , 'public');
                $this->update([
                    "avatar" => $file_path
                ]);
            }
        }
    }
}
