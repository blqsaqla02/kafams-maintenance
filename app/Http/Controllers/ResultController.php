<?php
  
namespace App\Http\Controllers;
  
use App\Models\Result;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
  
class ResultController extends Controller
{
    /**
     * Display a listing of the resource with search functionality.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');

        // If there's a search query, filter results
        if ($search) {
            $result = Result::where('student_name', 'like', '%' . $search . '%')
                             ->orWhere('student_class', 'like', '%' . $search . '%')
                             ->paginate(5);
        } else {
            // Default behavior: show all results
            $result = Result::latest()->paginate(5);
        }

        return view('results.index', compact('results'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('results.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'student_name' => 'required',
            'student_class' => 'required',
            'assessment_type' => 'required',
            'marks' => 'required',
        ]);
        
        Result::create($request->all());
         
        return redirect()->route('results.index')
                        ->with('success', 'Result created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Result $result): View
    {
        return view('results.show', compact('result'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result): View
    {
        return view('results.edit', compact('result'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result): RedirectResponse
    {
        $request->validate([
            'student_name' => 'required',
            'student_class' => 'required',
            'assessment_type' => 'required',
            'marks' => 'required',
        ]);
        
        $result->update($request->all());
        
        return redirect()->route('results.index')
                        ->with('success', 'Result updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result): RedirectResponse
    {
        $result->delete();
         
        return redirect()->route('results.index')
                        ->with('success', 'Result deleted successfully.');
    }
}


