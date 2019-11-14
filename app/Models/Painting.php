<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Painting extends Model
{
    use SoftDeletes;
    protected $fillable=['user_id','painting','name','description'];
}
