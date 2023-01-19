<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

public function members(){
    return $this->hasMany('App\Models\Member');
}
public function events(){
    return $this->hasMany('App\Models\Event');
}
}
