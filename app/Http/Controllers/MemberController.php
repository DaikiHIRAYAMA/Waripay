<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Calculate;
use Carbon\Carbon;


class MemberController extends Controller
{
    public function create(){

        $group = session()->get('group');

        return view('member.new',compact('group'));
    }

    public function store(Request $request){

      // return view('event.index')->with('request',$request);
        $members = [];
        $group_id = session()->get('group')->id;
        $cnt = $request->cnt;
        $i = 0;

        for($i = 0; $i < $cnt; $i++){
            $member = new Member();
            $member->group_id = $group_id;
            $member->member_name = $request->{"member_name_".$i};
            $member->save();
            $members[] = $member;

        }

        session()->put('members', $members);

        $parameter = $this->makeURI();

        $this->createCalculate();

        return redirect()->route('event.index',['parameter' => $parameter]);
    }

    public function makeURI(){

        $group_id = session()->get('group')->id;
        $date = Carbon::now();
        $data = json_encode(['group' => $group_id , 'date' => $date ]);
        $parameter = $this->base64_urlsafe_encode($data);

        return ($parameter);
    }

    function base64_urlsafe_encode($data) {
	    $data = base64_encode(gzcompress($data));
	    return str_replace(array('+', '/', '='), array('_', '-', '.'), $data);
}

    public function createCalculate(){

        $group_id = session()->get('group')->id;
        $members = Member::where('group_id',$group_id)->get();

        //calculate[]  を作成
        //一度だけ実行
        foreach($members as $member){
            $calculate = new Calculate();
            //$calculate->calculate = [];
            $calculate->group_id = $group_id;
            $calculate->member_id = $member->member_id;
            $calculate->save();
        }
    }

}
