<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Promotions\Application;
use App\Notifications\Auth\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'usersmysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function applicationOfPromotion($promotionId)
    {
        return $this->applications()->where('promotion_id', $promotionId)->get();
    }

    public function appliedForPromotion($id)
    {
        return $this->applicationOfPromotion($id)->isNotEmpty();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
