<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\LoseMember;
use App\Models\Admin\Event;
use App\Models\Admin\Gallery;
use DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $from = now()->startOfMonth();
        $to = now();
        $user = User::where('status', 1)->latest()->get();
        $enroll = $user->whereBetween('created_at', [$from, $to])->count();
        $add_hoc = $user->where('committee_type_id', 1)->count();
        $executive = $user->where('committee_type_id', 2)->count();
        $gallery = Gallery::where('status', 1)->count();
        $event = Event::where('status', 1)->count();
        $events = Event::where('status', 1)->latest()->orderByDesc('id')->take(3)->orderBy('id')->get();

        return view('dashboard', compact('user','enroll','add_hoc','executive','gallery','event','events'));
    }

    public function member()
    {
        $data =User::where('status', 1)->paginate(12);
        return view('layouts.pages.member',compact('data'));
    }
    public function memberSearch(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('member_code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('member_type_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('committee_type_id', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('committeeType', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('memberType', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%');
                    });
            });
        }
        

        $data = $query->where('status', 1)->paginate(12);
        return view('layouts.pages.member', compact('data'));
    }

}
