<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index()
    {
        return view('profile.view');
    }

    public function create(){
        return view('profile.create');
    }

    public function store(Request $request){

        $request->validate([
            'student_name'=>'required|string',
            'gender'=>'required|string',
            'address'=>'required|string',
            'parent_name'=>'required|string',
            'contact_no'=>'required|numeric',
        ]); 

        $profileDetails = new profileDetail();
        $profileDetails->student_name = $request -> input('student_name');
        $profileDetails->gender = $request->input('gender');
        $profileDetails->address =  $request->input('address');
        $profileDetails->parent_name =  $request->input('parent_name');
        $profileDetails->contact_no =  $request->input('contact_no');
    
        $profileDetails->submit();
      

        return redirect(route('profile.view'));
    }

    public function edit(profileDetail $profileDetails){

        $profile = profileDetail::find($profileDetails->id);

        return view('profile.view', ['profileDetail' => $profile]);
    }

    public function destroy(profileDetail $profileDetails)
    {
         $profileDetails->delete();

    return redirect()->route('profile.update');
    }
   
}