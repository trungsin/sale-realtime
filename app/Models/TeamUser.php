<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $guarded = ['id'];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
