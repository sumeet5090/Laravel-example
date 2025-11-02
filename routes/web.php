<?php

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/about', 'about');

// index
Route::get('/jobs', function () {
    return view('jobs.index', ['jobs' => Job::with('employer')->latest()->simplePaginate(5)]);
});

// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// show
Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', ['job' => Job::findOrFail($id)]);
});

// store
Route::post('/jobs', function () {
    request()->validate([
        'title' => 'required|min:3',
        'salary' => 'required|numeric',
    ]);
    
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => Employer::inRandomOrder()->first()->id,
    ]);

    return redirect('/jobs');
});

// edit
Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs.edit', ['job' => Job::findOrFail($id)]);
});

// update
Route::patch('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();

    return redirect("/jobs/{$id}");
});

// destroy
Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete();
    return redirect("/jobs");
});
