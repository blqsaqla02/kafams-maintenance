<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(){
            $profiles = profile::all();//fetch all records from profile Model
            return view('profile.view', ['profiles' => $profiles]);
        }
    public function view()
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
        // dd($request);
            
        // $profileDetails = profileDetail::create($request->all());
        $profileDetails = new profile();
        $profileDetails->student_name = $request -> input('student_name');
        $profileDetails->gender = $request->input('gender');
        $profileDetails->address =  $request->input('address');
        $profileDetails->parent_name =  $request->input('parent_name');
        $profileDetails->contact_no =  $request->input('contact_no');
    
        $profileDetails->save();
      

        return redirect(route('profile.view'));
    }

    public function edit(profile $profileDetails){

        $profiles = profile::find($profileDetails->id);

        return view('profile.view', ['profileDetail' => $profiles]);
    }

    public function destroy(profile $profileDetails)
    {
         $profileDetails->delete();

    return redirect()->route('profile.update');
    }
   
}