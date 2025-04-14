<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15', // Menambahkan aturan untuk nomor telepon
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'email' => 'Email',
            'password' => 'Kata Sandi',
            'phone' => 'Nomor Telepon', // Menambahkan atribut untuk nomor telepon
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => ':attribute tidak boleh kosong.',
            'email.required' => ':attribute tidak boleh kosong.',
            'email.email' => ':attribute tidak valid.',
            'email.unique' => ':attribute sudah terdaftar.',
            'password.required' => ':attribute tidak boleh kosong.',
            'password.min' => ':attribute minimal 8 karakter.',
            'phone.required' => ':attribute tidak boleh kosong.', // Menambahkan pesan untuk nomor telepon
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function validationData(): array
    {
        return [
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'phone' => $this->input('phone'), // Menambahkan nomor telepon ke data validasi
        ];
    }
}
