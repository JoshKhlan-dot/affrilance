<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // Freelancer routes
    Route::get('/freelancer/dashboard', [FreelancerController::class, 'dashboard'])
        ->name('freelancer.dashboard');
    Route::get('/jobs', [JobController::class, 'index'])
        ->name('jobs.index');
    Route::get('/jobs/{job}', [JobController::class, 'show'])
        ->name('jobs.show');
    Route::get('/jobs/{job}/propose', [ProposalController::class, 'create'])
        ->name('proposals.create');
    Route::post('/jobs/{job}/propose', [ProposalController::class, 'store'])
        ->name('proposals.store');
    Route::get('/my-proposals', [ProposalController::class, 'myProposals'])
        ->name('proposals.my');

    // Client routes
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])
        ->name('client.dashboard');
    Route::get('/client/jobs/create', [JobController::class, 'create'])
        ->name('jobs.create');
    Route::post('/client/jobs', [JobController::class, 'store'])
        ->name('jobs.store');
    Route::get('/client/jobs/{job}/proposals', [ProposalController::class, 'jobProposals'])
        ->name('proposals.job');
    Route::patch('/proposals/{proposal}/status', [ProposalController::class, 'updateStatus'])
        ->name('proposals.status');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';