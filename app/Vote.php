<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
