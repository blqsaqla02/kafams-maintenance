<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class ActivityController extends Controller
{

    //Old index functions in KAFA system
    // public function index()
    // {
    //     return view('bulletin.indexBulletin=');
    // }

    public function index()
    {
        return view('activity.mainActivity');   
    }


    //View Activity

    public function view($type)
    {

        $activities = Activity::all()
                    ->where('activityType', '=', $type);

        // dd($activities);

        return view('activity.viewActivity', [
            'type' => $type, 
            'activities' => $activities
        ]);
    }

    public function viewActivity($item, Activity $activity)
    {
        $fetch = Activity::find($activity->id);
        
        $levels = [1, 2, 3, 4, 5];

        $activityFile = Str::after($activity->file_path, '_');

        return view('activity.viewActivityFile', [
            'activity' => $fetch,
            'activityFile' => $activityFile,
            'levels' => $levels
        ]);
    }

    //Display add form

    public function addform($type)
    {
        return view('activity.addActivity', ['type' => $type]);
    }


    //Add activity form
    public function submitForm(Request $request, $type)
    {
        $request -> validate([
            'title' => 'required',
            'subject' => 'required',
            'level' => 'required',
            'file' => 'required|mimes:csv,txt,pdf|max:2048'
        ]);

        $activity = new Activity;

        if($request->file())
        {
            $activity->user_id = Auth::id();

            $filename = time().'_'.$request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $filename, 'public');
            $activity->activityType = $type;
            $activity->activityTitle = $request->title;
            $activity->activitySubject = $request->subject;
            $activity->activityLevel = $request->level;
            $activity->file_path = '/storage/' . $filePath;

            $activity->save();

            return Redirect::route('activity.viewActivity', ['type' => $type])
                    ->with('success', 'File had been uploaded successfully!');
        }
    }

    
    public function edit($type, Activity $activity)
    {
        // dd($item);

        $fetch = Activity::find($activity->id);
        
        $levels = [1, 2, 3, 4, 5];

        $activityFile = Str::after($activity->file_path, '_');

        return view('activity.editActivity', [
            'activity' => $fetch,
            'activityFile' => $activityFile,
            'levels' => $levels
        ]);
    }
    
    public function updateForm(Request $request, $type, Activity $activity)
    {
        $request -> validate([
            'title' => 'required',
            'subject' => 'required',
            'level' => 'required',
            'file' => 'mimes:csv,txt,pdf|max:2048'
        ]);

        $find_activity = Activity::find($activity->id);

        if($request->file())
        {
            $filename = time().'_'.$request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $filename, 'public');
            $find_activity->activityType = $activity->activityType;
            $find_activity->activityTitle = $request->title;
            $find_activity->activitySubject = $request->subject;
            $find_activity->activityLevel = $request->level;
            $find_activity->file_path = '/storage/' . $filePath;

            $find_activity->save();

            //Reemind to add functions to delete file in storage

            return redirect()->route('activity.viewActivity', compact('item'))
                    ->with('success', 'File had been uploaded successfully!');

        }
        else
        {
            //Remind to add the functions to enable edits without need to upload file
            //Means fix thiss

            $find_activity->activityType = $activity->activityType;
            $find_activity->activityTitle = $request->title;
            $find_activity->activitySubject = $request->subject;
            $find_activity->activityLevel = $request->level;

            $find_activity->save();

            return redirect()->route('activity.viewActivity', ['type' => $find_activity->activityType])
            ->with('success', 'File had been uploaded successfully!');
        }
    }

    // Destroy the file

    public function destroy($type, Activity $activity)
    {
        $delete = Activity::where('id', $activity->id)->firstorfail()->delete();
        return redirect()->route('activity.viewActivity', [
            'type' => $type
        ])
        ->with('success', 'File had been uploaded successfully!');
    }
    
}