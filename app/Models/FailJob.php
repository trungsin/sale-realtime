<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FailJob extends Model
{
	protected $table = 'failed_jobs';
	protected $guarded = ['id'];
}
