<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }
    public function members(){
    return $this->belongsToMany('App\Models\Member');
    }
}
