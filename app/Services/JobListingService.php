<?php

namespace App\Services;

use App\Models\JobListing;
use App\Repositories\JobListingRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class JobListingService
{
    protected $repository;

    public function __construct(JobListingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllActiveJobs(): LengthAwarePaginator
    {
        return $this->repository->getAllActivePaginated();
    }
    public function getJobBySlug(string $slug): ?JobListing
    {
        return $this->repository->findBySlug($slug);
    }
}
