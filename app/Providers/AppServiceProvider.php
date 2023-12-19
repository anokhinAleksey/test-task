<?php

namespace App\Providers;

use App\Contracts\GradeServiceInterface;
use App\Contracts\ProfessorDataReaderInterface;
use App\Contracts\QuestionServiceInterface;
use App\Contracts\StudentDataReaderInterface;
use App\Services\GradeService;
use App\Services\ProfessorDataReader;
use App\Services\QuestionService;
use App\Services\StudentDataReader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentDataReaderInterface::class, StudentDataReader::class);
        $this->app->bind(ProfessorDataReaderInterface::class, ProfessorDataReader::class);
        $this->app->bind(QuestionServiceInterface::class, QuestionService::class);
        $this->app->bind(GradeServiceInterface::class, GradeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
