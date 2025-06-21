<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Services\JobListingService;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    protected $jobService;

    public function __construct(JobListingService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        $jobs = $this->jobService->getAllActiveJobs();
        return view('jobs.index', compact('jobs'));
    }
    public function show($slug)
    {
        $job = $this->jobService->getJobBySlug($slug);
        return view('jobs.show', compact('job'));
    }
    public function adminIndex()
    {
        $jobs = $this->jobService->getAllJobs();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.form');
    }
}
