<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Image;
use App\Models\Admin\Gallery;
use App\Models\Admin\Event;
use App\Models\Admin\LoseMember;
use DB;

class FrontViewController extends Controller
{
    public function welcome()
    {
        $ecommittee = DB::table('users')
            ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
            ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
            ->join('info_others', 'users.id', '=', 'info_others.user_id')
            ->select('users.*','info_personals.*','info_academics.*','info_others.*')
            ->where('users.cm_ecommittee', '=', '1')
            ->get();
        $gallery = Gallery::where('public','=','1')->get();
        $event = Event::latest()->orderByDesc('event_date')->take(3)->orderBy('id')->get();
        $lose_member = LoseMember::all();

        // return view('welcome',compact(['ecommittee']));
        return view('welcome',compact(['ecommittee','event','lose_member','gallery']));
    }
}
