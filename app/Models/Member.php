<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['member_name', 'group_id'];

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }
    public function events()
{
    return $this->belongsToMany('App\Models\Event');
}

}
