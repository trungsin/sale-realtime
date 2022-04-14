<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamAccount extends Model
{
    protected $guarded = ['id'];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function account()
    {
        return $this->hasOne("App\Models\Account");
    }
}
