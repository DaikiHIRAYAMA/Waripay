<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class GroupController extends Controller
{
    public function create(){

        return view('group.new');
    }


    public function store(Request $request){

        $group = new Group();
        $group->group_name = $request->group_name;
        $group->save();
        $group_id = $group->group_id;
        session(['group' => $group]);
        session(['group_id' => $group_id]);

        return redirect()->route('member.create');//->with('group' , $group);

    }
}

