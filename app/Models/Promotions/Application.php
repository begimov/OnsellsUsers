<?php

namespace App\Models\Promotions;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Application extends Model
{
    protected $connection = 'usersmysql';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
