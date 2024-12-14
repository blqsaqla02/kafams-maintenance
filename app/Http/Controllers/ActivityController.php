<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
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

    public function view($item)
    {

        $activities = Activity::all()
                    ->where('activityType', '=', $item);

        // dd($activities);

        return view('activity.viewActivity', compact('item'), compact('activities'));
    }

    //Display add form

    public function addform($item)
    {
        return view('activity.addActivity', compact('item'));
    }


    //Add activity form
    public function submitForm(Request $request, $item)
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
            $activity->activityType = $item;
            $activity->activityTitle = $request->title;
            $activity->activitySubject = $request->subject;
            $activity->activityLevel = $request->level;
            $activity->file_path = '/storage/' . $filePath;

            $activity->save();

            return Redirect::route('activity.viewActivity', compact('item'))
                    ->with('success', 'File had been uploaded successfully!');
        }
    }

    
    public function edit($item, $id)
    {
        // dd($item);

        $activity = Activity::find($id);
        
        $levels = [1, 2, 3, 4, 5];

        $activityFile = Str::after($activity->file_path, '_');

        return view('activity.editActivity', compact('activity', 'item', 'activityFile', 'levels'));
    }


    public function delete()
    {
        return 0;
    }
    public function updateForm(Request $request, $item, $id)
    {
        $request -> validate([
            'title' => 'required',
            'subject' => 'required',
            'level' => 'required',
            'file' => 'mimes:csv,txt,pdf|max:2048'
        ]);

        $activity = Activity::find($id);

        if($request->file())
        {
            $filename = time().'_'.$request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $filename, 'public');
            $activity->activityType = $item;
            $activity->activityTitle = $request->title;
            $activity->activitySubject = $request->subject;
            $activity->activityLevel = $request->level;
            $activity->file_path = '/storage/' . $filePath;

            $activity->save();

            //Reemind to add functions to delete file in storage

            return Redirect::route('activity.viewActivity', compact('item'))
                    ->with('success', 'File had been uploaded successfully!');

        }
        else
        {
            //Remind to add the functions to enable edits without need to upload file
            //Means fix thiss

            $activity->activityType = $item;
            $activity->activityTitle = $request->title;
            $activity->activitySubject = $request->subject;
            $activity->activityLevel = $request->level;

            $activity->save();

            return Redirect::route('activity.viewActivity', compact('item'))
            ->with('success', 'File had been uploaded successfully!');
        }
    }

    // Destroy the file

    public function destroy($item, $id)
    {
        $activity = Activity::where('id', $id)->firstorfail()->delete();
        return Redirect::route('activity.viewActivity', compact('item'))
                    ->with('success', 'File had been uploaded successfully!');
    }
    
}