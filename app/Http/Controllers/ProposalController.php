<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    // Show proposal form
    public function create(Job $job)
    {
        // Check if freelancer already submitted a proposal
        $existing = Proposal::where('job_id', $job->id)
                            ->where('freelancer_id', Auth::id())
                            ->first();

        return view('proposals.create', compact('job', 'existing'));
    }

    // Save proposal
    public function store(Request $request, Job $job)
    {
        $request->validate([
            'cover_letter'  => 'required|string|min:50',
            'bid_amount'    => 'required|numeric|min:1',
            'currency'      => 'required|string',
            'delivery_days' => 'required|integer|min:1',
        ]);

        // Prevent duplicate proposals
        $existing = Proposal::where('job_id', $job->id)
                            ->where('freelancer_id', Auth::id())
                            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You have already submitted a proposal for this job.');
        }

        Proposal::create([
            'job_id'        => $job->id,
            'freelancer_id' => Auth::id(),
            'cover_letter'  => $request->cover_letter,
            'bid_amount'    => $request->bid_amount,
            'currency'      => $request->currency,
            'delivery_days' => $request->delivery_days,
            'status'        => 'pending',
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Proposal submitted successfully!');
    }

    // Show freelancer's proposals
    public function myProposals()
    {
        $proposals = Proposal::where('freelancer_id', Auth::id())
                            ->with('job')
                            ->latest()
                            ->get();

        return view('proposals.my-proposals', compact('proposals'));
    }

    // Show proposals for a job (client view)
    public function jobProposals(Job $job)
    {
        $proposals = Proposal::where('job_id', $job->id)
                            ->with('freelancer')
                            ->latest()
                            ->get();

        return view('proposals.job-proposals', compact('job', 'proposals'));
    }

    // Accept or reject a proposal
    public function updateStatus(Request $request, Proposal $proposal)
    {
        $proposal->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Proposal status updated!');
    }
}