<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Facades\Image;

class Manager extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password','date_of_joining', 'experience','department_id' ,'avatar', 'status',
                            'no_of_assigned_tasks', 'remember_token', 'fyp' , 'industrial_project' , 'hec_project'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

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
            $dir = public_path('storage/images/managers/' . $this->id);
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
