<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class RegisterController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function showRegistrationForm()
    {
        return view('pages.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();

        $request->merge(['role' => 'student']);

        $data = $request->only('name', 'email', 'password', 'role', 'phone');

        $user = $this->authRepository->register($data);

        Swal::toast('Registrasi berhasil', 'success')->timerProgressBar();

        // Redirect ke halaman pemilihan minat
        return redirect()->route('student.select-interests.show');
    }
}
