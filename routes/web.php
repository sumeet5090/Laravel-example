<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact ', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs.index', ['jobs' => Job::with('employer')->latest()->simplePaginate(5)]);
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => 'required|min:3',
        'salary' => 'required|numeric',
    ]);
    
    return Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create', ['jobs' => Job::with('employer')->paginate(3)]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('jobs.job', ['job' => Job::find($id)]);
});

Route::get('/about', function () {
    return view('about');
});
