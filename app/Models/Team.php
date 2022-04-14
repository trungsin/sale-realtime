<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = ['id'];

    public function teamUsers()
    {
        return $this->hasMany('App\Models\TeamUser');
    }

    public function teamAccounts()
    {
        return $this->hasMany('App\Models\TeamAccount');
    }
}
