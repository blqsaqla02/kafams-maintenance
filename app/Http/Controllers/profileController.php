<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


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

     public function index2()
     {
         $userId = Auth::id(); // Get the authenticated user's ID
         if (!$userId) {
             return redirect()->route('register'); // Redirect to register if the user is not authenticated
         }

        $profile = Profile::find($userId); // Fetch a single profile by user ID
        if (!$profile) {
            return redirect()->route('profile.create'); // Redirect to create profile if none exists                   
        }

        return view('profile.view', ['profile' => $profile]);
    }

    // public function index2($id)
    // {
    //          $profile = Profile::find($id); // Fetch a single profile from the database
    //               return view('profile.view', ['profile' => $profile]);
    //             }

                public function view($id)
                {
                    $profile = Profile::find($id); // Fetch the profile with the given ID
                
                    return view('profile.view', compact('profile'));
                }

                public function show($id)
                {
                    $profile = Profile::find($id); // Fetch the profile with the given ID
                
                    return view('profile.show', compact('profile'));
                }
                
                
    // public function view()
    // {
    //     return view('profile.view', compact('profile'));
    // }

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
            
        // $profile = profile::create($request->all());
        $profiles = new profile();
        $profiles->student_name = $request -> input('student_name');
        $profiles->gender = $request->input('gender');
        $profiles->address =  $request->input('address');
        $profiles->parent_name =  $request->input('parent_name');
        $profiles->contact_no =  $request->input('contact_no');
    
        $profiles->save();
      
        return redirect(route('profile.view', ['id' => $profiles->id]));

        // return redirect(route('profile.view'));
    }

        public function edit($id) // Add the parameter to fetch the profile by ID
    {
        $profile = profile::findOrFail($id);
        return view('profile.edit', ['profile' => $profile]);
    }
    

    // public function destroy(profile $profile)
    // {
    //      $profile->delete();

    // return redirect()->route('profile.update');
    // }
    
   //delete a profile
    public function destroy($id)
{
    $profiles = profile::findOrFail($id);
    $profiles->delete();
    return redirect()->route('profile.index')->with('success', 'Profile deleted successfully.');
}

}