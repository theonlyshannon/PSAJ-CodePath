<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\InterestStoreRequest;
use App\Interfaces\InterestRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class InterestController extends Controller
{
    protected $interestRepository;

    public function __construct(InterestRepositoryInterface $interestRepository)
    {
        $this->interestRepository = $interestRepository;
    }

    /**
     * Menampilkan formulir untuk memilih minat.
     */
    public function show()
    {
        $universities = \App\Models\University::all();
        $faculties = \App\Models\Faculty::all();

        return view('pages.student.select-interests', compact('universities', 'faculties'));
    }

    /**
     * Menyimpan pilihan minat mahasiswa.
     */
    public function store(InterestStoreRequest $request)
    {
        $data = $request->validated();

        try {
            $this->interestRepository->createStudentInterest($data);
            Alert::success('Success', 'Interests saved successfully.');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to save interests. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('app.dashboard');
    }
}
