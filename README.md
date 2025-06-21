# Plaksha University Job Board

A Laravel-based job board application for managing and displaying job listings at Plaksha University.

## Features

-   Public job listings with search and pagination
-   Admin interface for managing job postings
-   Responsive design using Bootstrap
-   SEO-friendly URLs
-   Mobile-first approach

## Prerequisites

-   PHP >= 8.1
-   Composer
-   MySQL or SQLite
-   Node.js and NPM
-   Web server (Apache/Nginx)
-   Git

## Installation Steps

1. **Clone the Repository**

    ```bash
    git clone <repository-url>
    cd plaksha-job
    ```

2. **Install PHP Dependencies**

    ```bash
    composer install
    ```

3. **Install NPM Dependencies**

    ```bash
    npm install
    ```

4. **Environment Setup**

    ```bash
    # Copy the example env file
    cp .env.example .env

    # Generate application key
    php artisan key:generate
    ```

5. **Configure Database**

    Edit `.env` file and set your database credentials else sqlite DB already present:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=plaksha_job
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run Migrations**

    ```bash
    php artisan migrate
    ```

7. **Build Assets**

    ```bash
    npm run dev
    ```

8. **Start the Development Server**

    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`

## Directory Structure

-   `app/Models/` - Contains the JobListing model
-   `app/Http/Controllers/` - Contains the JobListingController
-   `app/Services/` - Contains the JobListingService
-   `app/Repositories/` - Contains the JobListingRepository
-   `resources/views/` - Contains all Blade templates
-   `database/migrations/` - Contains database migrations

## Key Files

-   `routes/web.php` - Contains all routes
-   `resources/views/layouts/app.blade.php` - Main layout template
-   `resources/views/jobs/` - Public job listing views
-   `resources/views/admin/jobs/` - Admin interface views

## Available Routes

-   Public Routes:

    -   `GET /` - Home page with job listings
    -   `GET /careers/{slug}` - Individual job details

-   Admin Routes:
    -   `GET /admin/careers` - Admin dashboard
    -   `GET /admin/careers/create` - Create new job
    -   `GET /admin/careers/{slug}/edit` - Edit existing job
    -   `POST /admin/careers` - Store new job
    -   `PUT /admin/careers/{slug}` - Update existing job
    -   `DELETE /admin/careers/{slug}` - Delete job
    -   `PATCH /admin/careers/{slug}/toggle` - Toggle job status

## Customization

### Styling

-   Custom styles can be added in `resources/css/app.css`
-   Bootstrap classes are used for layout and components

### Configuration

-   Pagination settings: Edit `$this->perPage` in `JobListingRepository.php`
-   Job fields: Modify the migration and model files

## Troubleshooting

1. **Composer Issues**

    ```bash
    composer install --ignore-platform-reqs
    ```

2. **Permission Issues**

    ```bash
    chmod -R 775 storage bootstrap/cache
    ```

3. **Database Issues**
    ```bash
    php artisan config:clear
    php artisan migrate:fresh
    ```
