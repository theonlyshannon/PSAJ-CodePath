<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 *Import Interface
 *
 */
use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\MentorRepositoryInterface;
use App\Interfaces\StudentRepositoryInterface;
use App\Interfaces\WriterRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\ArticleCategoryRepositoryInterface;
use App\Interfaces\ArticleTagRepositoryInterface;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\UniversityRepositoryInterface;
use App\Interfaces\FacultyRepositoryInterface;
use App\Interfaces\AIRepositoryInterface;
use App\Interfaces\CourseCategoryRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\InterestRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ArticleVisitorRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\CourseReviewRepositoryInterface;
use App\Interfaces\ArticleCommentRepositoryInterface;


/**
 *Import Repository
 *
 */
use App\Repositories\AuthRepository;
use App\Repositories\MentorRepository;
use App\Repositories\StudentRepository;
use App\Repositories\WriterRepository;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleTagRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\UniversityRepository;
use App\Repositories\FacultyRepository;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\CourseRepository;
use App\Repositories\InterestRepository;
use App\Repositories\ArticleVisitorRepository;
use App\Repositories\UserRepository;
use App\Repositories\AIRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\CourseReviewRepository;
use App\Repositories\ArticleCommentRepository;


use App\Services\AIService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(MentorRepositoryInterface::class, MentorRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(WriterRepositoryInterface::class, WriterRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(ArticleCategoryRepositoryInterface::class, ArticleCategoryRepository::class);
        $this->app->bind(ArticleTagRepositoryInterface::class, ArticleTagRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(UniversityRepositoryInterface::class, UniversityRepository::class);
        $this->app->bind(FacultyRepositoryInterface::class, FacultyRepository::class);
        $this->app->bind(CourseCategoryRepositoryInterface::class, CourseCategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AIRepositoryInterface::class, AIRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(InterestRepositoryInterface::class, InterestRepository::class);
        $this->app->bind(ArticleVisitorRepositoryInterface::class, ArticleVisitorRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(CourseReviewRepositoryInterface::class, CourseReviewRepository::class);
        $this->app->bind(ArticleCommentRepositoryInterface::class, ArticleCommentRepository::class);
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
