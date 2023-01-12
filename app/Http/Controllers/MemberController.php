<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;


class MemberController extends Controller
{
    public function create(){

        $group = session()->get('group');

        return view('member.new',compact('group'));
    }

    public function store(Request $request){

      // return view('event.index')->with('request',$request);

     
        $members = [];
        $group = session()->get('group');
        $cnt = $request->cnt;
        $i = 0;
        $member = new Member();
        $member->group_id = $request->group_id;
        $member->member_name = $request->{"member_name_".$i};
        $member->save();
        $members[] = $member;



        /*
        for($i = 0; $i < $cnt; $i++){

            $member = new Member();
            $member->group_id = $group->group_id;

            $member->member_name = $request->{"member_name_".$i};
            $member->save();
            $members[] = $member;
            return view('event.index')->with('member',$member);

        }

        */
        session()->push('members', $members);

        return redirect()->route('event.create');



    }
}
