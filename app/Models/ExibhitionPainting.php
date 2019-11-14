<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExibhitionPainting extends Model
{
    protected $fillable=['exiid','paintid'];

    public function exibhition(){
        return $this->hasOne('App\Models\Exhibition','id','exiid');
    }
}
