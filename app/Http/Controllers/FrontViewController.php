<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Image;
use App\Models\Admin\Gallery;
use App\Models\Admin\Event;
use App\Models\Master\MemberType;
use App\Models\User;
use DB;

class FrontViewController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function index1()
    {
        return view('comming_soon');
    }
    /**________________________________________________________________________________________
     * Committee Menu Pages
     * ________________________________________________________________________________________
     */
    public function index2()
    {
        return view('comming_soon');
    }
    /**________________________________________________________________________________________
     * Members Menu Pages
     * ________________________________________________________________________________________
     */
    public function member($id)
    {
        $data = User::where('member_type_id', $id)->where('status', 1)->get();
        $membersType = MemberType::where('id', $id)->first()->name;

        return view('frontend.pages.member',compact('data', 'membersType'));
    }
    /**________________________________________________________________________________________
     * Gallery Menu Pages
     * ________________________________________________________________________________________
     */
    public function galleryImage()
    {
        $posts=Gallery::where('public','=','1')->with('user')->get();
        return view('frontend.pages.gallery_album',compact('posts'));
    }
    public function galleryShow($id)
    {
        $posts=Gallery::findOrFail($id);
        return view('frontend.pages.gallery_image')->with('posts',$posts);
    }
    /**________________________________________________________________________________________
     * Events Menu Pages
     * ________________________________________________________________________________________
     */
    public function events()
    {
        $events =Event::all();
        return view('frontend.pages.events',compact('events'));
    }
    public function eventShow($id)
    {
        $events =Event::latest()->orderByDesc('id')->take(10)->orderBy('id')->get();
        $data =Event::findOrFail($id);
        return view('frontend.pages.events_details',compact('events','data'));
    }
    /**________________________________________________________________________________________
     * Contact Menu Pages
     * ________________________________________________________________________________________
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    /**________________________________________________________________________________________
     * Comming Soon Page
     * ________________________________________________________________________________________
     */
    public function comming_soon()
    {
        return view('comming_soon');
    }
}
