<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'email', 'password', 'levelid', 'status_id',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkstatus($status)
    {
        if ($status == 'student') {
            return Redirect::to('student/home');
        } elseif ($status == 'teacher') {
            return Redirect::to('teacher/home');
        } elseif ($status == 'admin') {
            return Redirect::to('admin/admin');
        } else {
            return Redirect::to('/home');
        }
    }
}
