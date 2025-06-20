<?php

namespace App\Repositories;

use App\Models\JobListing;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class JobListingRepository
{
    public function getAllActive(): Collection
    {
        return JobListing::active()->latest()->get();
    }

    public function getAllActivePaginated(): LengthAwarePaginator
    {
        return JobListing::active()->latest()->paginate(6);
    }

    public function findBySlug(string $slug): ?JobListing
    {
        return JobListing::where('slug', $slug)->firstOrFail();
    }
}
