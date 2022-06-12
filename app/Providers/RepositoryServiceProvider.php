<?php

namespace App\Providers;

use App\Interfaces\OptionRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Repositories\OptionRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QuizRepositoryInterface::class, QuizRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(OptionRepositoryInterface::class, OptionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
