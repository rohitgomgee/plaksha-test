<?php

namespace App\Repositories;

use App\Models\JobListing;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class JobListingRepository
{
    /**
     * Number of results per page for pagination.
     *
     * @var int
     */
    protected int $perPage;

    public function __construct()
    {
        $this->perPage = 6;
    }

    /**
     * Get all active job listings without pagination.
     */
    public function getAllActive(): Collection
    {
        return JobListing::active()->latest()->get();
    }

    /**
     * Get all active job listings with pagination.
     */
    public function getAllActivePaginated(): LengthAwarePaginator
    {
        return JobListing::active()->latest()->paginate($this->perPage);
    }

    /**
     * Get all job listings without pagination.
     */
    public function getAll(): Collection
    {
        return JobListing::latest()->get();
    }

    /**
     * Get all job listings with pagination.
     */
    public function getAllPaginated(): LengthAwarePaginator
    {
        return JobListing::latest()->paginate($this->perPage);
    }

    /**
     * Find a job listing by slug.
     */
    public function findBySlug(string $slug): ?JobListing
    {
        return JobListing::where('slug', $slug)->firstOrFail();
    }

    /**
     * Create a new job listing.
     */
    public function create(array $data): JobListing
    {
        return JobListing::create($data);
    }

    /**
     * Update a given job listing.
     */
    public function update(JobListing $job, array $data): bool
    {
        return $job->update($data);
    }

    /**
     * Delete a given job listing.
     */
    public function delete(JobListing $job): bool
    {
        return $job->delete();
    }
}
