<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\KategoriJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $kategori = KategoriJob::all();
        $jobs = Job::paginate(12);

        return viewCompro('jobs.index', compact('kategori', 'jobs'));
    }

    public function show($id)
    {
        $job = Job::where('id', hashId($id, 'decode'))->firstOrFail();

        return view('front.compro-1.jobs.detail', compact('job'));
    }
}
