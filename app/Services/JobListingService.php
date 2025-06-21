<?php

namespace App\Services;

use App\Models\JobListing;
use App\Repositories\JobListingRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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

    public function getAllJobs(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated();
    }

    public function getJobBySlug(string $slug): ?JobListing
    {
        return $this->repository->findBySlug($slug);
    }

    public function createJob(array $data): JobListing
    {
        if (isset($data['title']) && !isset($data['slug'])) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);
        }

        return $this->repository->create($data);
    }

    public function updateJob(JobListing $job, array $data): bool
    {
        if (isset($data['title']) && !isset($data['slug'])) {
            $data['slug'] = $this->generateUniqueSlug($data['title'], $job->id);
        }

        return $this->repository->update($job, $data);
    }

    // if same job title post added multiple times
    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            DB::table('job_listings')
            ->where('slug', $slug)
            ->when($ignoreId, function ($query) use ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            })
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
    public function deleteJob(JobListing $job): bool
    {
        return $this->repository->delete($job);
    }

    public function toggleJobStatus(JobListing $job): bool
    {
        return $this->repository->update($job, ['is_active' => !$job->is_active]);
    }
}
