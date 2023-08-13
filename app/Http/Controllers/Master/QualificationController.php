<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MastQualification;

class QualificationController extends Controller
{
    public function index() {
        $data = MastQualification::where('is_delete', 0)->orderBy('name', 'desc')->get();
        return view('layouts.pages.master.member-qualification', compact('data'));
    }
    public function store(Request $request)
    {
        //----Validation Check 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //----Data Save
        if(isset($request->id)){
            $data = MastQualification::findOrFail($request->id);
        }else{
            $data = new MastQualification();
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();
        
        // Return message
        return response()->json([
            'data' => $data,
            'creator_name' => Auth::user()->name,
        ], 200);
    }
    public function edit(Request $request)
    {
        $data = MastQualification::where('is_delete', 0)->where('id', $request->id)->first();
        // Return message
        return response()->json(['data' => $data], 200);
    }
    public function delete(Request $request)
    {
        $data = MastQualification::findOrFail($request->id);
        $data->is_delete = 1;
        $data->save();
        
        // Return message
        return response()->json(['data' => $data], 200);
    }
}
