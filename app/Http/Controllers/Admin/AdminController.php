<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\LoseMember;
use App\Models\Admin\Event;
use DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $lose_member = LoseMember::latest()->get();
        $user = User::latest()->get();
        $cm_adviser = $user->where('cm_adviser', true)->count();
        $cm_ecommittee = $user->where('cm_ecommittee', true)->count();
        $cm_welfare = $user->where('cm_welfare', true)->count();
        $approve = $user->where('status', '=', '0')->where('is_admin', '=', '1')->count();
        $event = Event::latest()->count();

        $from = now()->startOfMonth();
        $to = now();
        $enroll = User::whereBetween('created_at', [$from, $to])->count();
        $events = Event::latest()->orderByDesc('id')->take(3)->orderBy('id')->get();

        return view('dashboard',compact('user','cm_adviser','cm_ecommittee','cm_welfare','lose_member','approve','event','enroll','events'));
    }
}
