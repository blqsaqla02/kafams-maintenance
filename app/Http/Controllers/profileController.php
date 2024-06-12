<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class profileController extends Controller
{


    public function index(){
        $profiles = profile::all();//fetch all records from profile Model
        return view('profile.update', ['profiles' => $profiles]);
    }

    public function index2($id)
{
    $profile = Profile::find($id); // Fetch a single profile from the database
    return view('profile.view', ['profile' => $profile]);
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

        public function edit($id) // Add the parameter to fetch the profile by ID
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', ['profile' => $profile]);
    }
    

    // public function destroy(profile $profile)
    // {
    //      $profile->delete();

    // return redirect()->route('profile.update');
    // }
   
    public function destroy($id)
{
    $profile = Profile::findOrFail($id);
    $profile->delete();
    return redirect()->route('profile.update')->with('success', 'Profile deleted successfully.');
}

}