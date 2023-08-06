<?php

namespace App\Http\Controllers;

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
    public function index3()
    {
        return view('comming_soon');
    }
    /**________________________________________________________________________________________
     * Events Menu Pages
     * ________________________________________________________________________________________
     */
    public function index4()
    {
        return view('comming_soon');
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
