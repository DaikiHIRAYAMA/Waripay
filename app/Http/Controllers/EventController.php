<?php

namespace App\Http\Controllers;

//use App\Http\Livewire\Member;

use App\Models\Calculate;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\URL;


//use App\Models\Member;
use Carbon\Carbon;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameter = $this->getURI();
        $group = session()->get('group');
        $events = Event::where('group_id',$group->id)->get();
        //$test = Event::with('member_name')->first();
        //orderBy('created-at','desc');
        $members = Member::where('group_id',$group->id)->get();
        $members_name = Member::where('group_id',$group->id)->value('member_name');
        //dd($parameter);
        //$this->addCalculate();
        $calculates = [];
        foreach($members as $member){
            ${"array".$member->member_id} = [];
            ${"array".$member->member_id}[] = $member->member_name;
            $calculate = Calculate::where('member_id',$member->member_id)->value('calculate');
            ${"array".$member->member_id}[] =json_decode($calculate,true);
            $calculates[] = ${"array".$member->member_id};
            }

      //  dd(gettype($calculates));
       // dd($calculates);


        return view('event.index',compact('group','parameter','events','members','calculates','members_name'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //event登録ページ
    {
        $group = session()->get('group');
        $parameter = $this->getURI_removeCreate();
        $members = Member::where('group_id',$group->id)->get();


        /*
        $group_id = session()->get('group')->id;
        $members = Member::where('group_id',$group_id);
        */
        return view('event.new',compact('parameter','members'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group_id = session()->get('group')->id;

        //event の作成
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->receiver_list = json_encode($request->receiver_list);
        $event->payer_list = $request->payer_list;
        $event->cost = $request->cost;
        $event->group_id = $group_id;
        $event->save();

        //calculateの作成
            $cost = $request->cost;
            //payer
            $minus = Calculate::where('member_id',$request->payer_list)->first();
            $minus_calculate = json_decode($minus->calculate,true);//json→array
            //支払った人にマイナスを加える
            $minus_calculate[] = -1*($cost);
            //dd($minus_calculate);
            //array_push($minus_calculate,-($cost));
            $minus->calculate = json_encode($minus_calculate);
            //save
            $minus->save();

            //receiver
            $receivers = $request->receiver_list;
            // 支払った人数
            $count = count($receivers);
            //一人当たりの金額
            $cost_per_number = $cost / $count ;
            //支払ってもらった人にプラスを加える
            foreach($receivers as $rec){
                $plus = Calculate::where('member_id',$rec)->first();
                $plus_calculate = json_decode($plus->calculate,true);
                $plus_calculate[] = $cost_per_number;
                $plus->calculate = $plus_calculate;
                $plus->save();
            }

        //受け渡す変数の作成
        $parameter = $this->getURI_removeCreate();
        $group = session()->get('group');
        $events = Event::where('group_id',$group->id)->get();
        $members = Member::where('group_id',$group->id)->get();
        $members_name = Member::where('group_id',$group->id)->value('member_name');
        $calculates = [];
            foreach($members as $member){
                ${"array".$member->member_id} = [];
                ${"array".$member->member_id}[] = $member->member_name;
                $calculate = Calculate::where('member_id',$member->member_id)->value('calculate');
                ${"array".$member->member_id}[] =json_decode($calculate,true);
                $calculates[] = ${"array".$member->member_id};
            }


        return redirect()->route('event.index',
        ['parameter' => $parameter, 'events' => $events, 'members' => $members, 'calculates' => $calculates, 'members_name' => $members_name]);
    }

    public function getURI(){ //event/{parameter}の時使用可能
        $url = URL::current();
        $str = str_replace('http://localhost/event/', '', $url);

        $parameter = $str;
        return ($parameter);
    }

        public function getURI_removeCreate(){ //event/{parameter}/createの時使用可能
        $url = URL::current();

        $str = str_replace('http://localhost/event/', '', $url);
        //$cut_event = substr($url,23);///event/の７文字削除
        $cut_create = substr($str,0,-7);///create/の７文字削除
        $parameter = $cut_create;
        return ($parameter);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calculate(){

        $group = session()->get('group');

        $this->addCalculate();

        $calculates = Calculate::where('group_id',$group->id)->get();

        return ($calculates);
    }

    public function addCalculate(){

        $group = session()->get('group');
        $events = Event::where('group_id',$group->id)->get();

        //calculate に数字を入れていく
        //payerはマイナス、receiver はプラス
        foreach($events as $event){

            $cost = $event->cost;
            $payer = $event->payer_list;

            //payer
            $minus = Calculate::where('member_id',$payer)->first();
            $minus_calculate = json_decode($minus->calculate,true);//json→array
            //支払った人にマイナスを加える
            $minus_calculate[] = -1*($cost);
            //encode
            $encode_minus_calculate = json_encode($minus_calculate);
            $minus->calculate = $minus_calculate;
            //save
            $minus->save();

            //receiver
            $receiver = $event->receiver_list;
            //json形式をarrayに変換
            $array = json_decode($receiver,true);
            // 支払った人数
            $count = count($array);
            //一人当たりの金額
            $cost_per_number = $cost / $count ;
            //支払ってもらった人にプラスを加える
            foreach($array as $rec){
            $plus = Calculate::where('member_id',$rec)->first();
            $plus_calculate = json_decode($plus->calculate,true);
            $plus_calculate[] = $cost_per_number;
            //encode
            $encode_plus_calculate = json_encode($plus_calculate);
            $plus->calculate = $encode_plus_calculate;
            //save
            $plus->save();
            }
        }
    }


}
