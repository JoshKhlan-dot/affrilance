<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Show all open jobs for freelancers
    public function index()
    {
        $jobs = Job::where('status', 'open')
                    ->with('client')
                    ->latest()
                    ->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    // Show single job detail
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Show form to post a job (clients only)
    public function create()
    {
        return view('jobs.create');
    }

    // Save new job to database
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string',
            'budget_min'  => 'required|numeric',
            'budget_max'  => 'required|numeric',
            'deadline'    => 'required|date',
            'skills_required' => 'required|string',
        ]);

        Job::create([
            'client_id'       => Auth::id(),
            'title'           => $request->title,
            'description'     => $request->description,
            'category'        => $request->category,
            'budget_type'     => $request->budget_type ?? 'fixed',
            'budget_min'      => $request->budget_min,
            'budget_max'      => $request->budget_max,
            'skills_required' => $request->skills_required,
            'location'        => $request->location ?? 'Remote',
            'deadline'        => $request->deadline,
            'status'          => 'open',
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Job posted successfully!');
    }
}