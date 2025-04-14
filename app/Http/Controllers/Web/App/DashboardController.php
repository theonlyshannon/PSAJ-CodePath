<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularCourses = $this->courseRepository->getAllCourse(3);
        return view('pages.app.dashboard', compact('popularCourses'));
    }
}
