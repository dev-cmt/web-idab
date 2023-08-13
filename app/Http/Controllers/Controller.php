<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Contact;
use App\Models\Master\MemberType;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $message;
    protected $memberType;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                // Retrieve user's messages
                $this->message = Contact::where('to_id', '=', Auth::user()->id)->get();
                view()->share('message', $this->message);

                // Retrieve member types
                $this->memberType = MemberType::get();
                view()->share('memberType', $this->memberType);
            }
            
            return $next($request);
        });
        
        
    }
}
