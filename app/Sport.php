<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $guarded = [];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'sport_id');
    }
}
