<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mentor_id' => 'required|exists:mentors,id',
            'course_category_id' => 'required|exists:course_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'trailer' => ['required', 'regex:/^(https?:\/\/)?(www\.)?youtube\.com\/embed\/[a-zA-Z0-9_-]{11}$/'],
            'syllabus' => 'required|array',
            'syllabus.*.sort' => 'required|integer',
            'syllabus.*.title' => 'required|string|max:255',
            'syllabus.*.video' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?youtube\.com\/embed\/[a-zA-Z0-9_-]{11}$/'],
            'is_favourite' => 'nullable|in:0,1',
            'is_free' => 'nullable|boolean',
            'price' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'mentor_id' => 'Mentor',
            'course_category_id' => 'Kategori Kursus',
            'title' => 'Judul',
            'slug' => 'Slug',
            'description' => 'Deskripsi',
            'thumbnail' => 'Thumbnail',
            'trailer' => 'Trailer',
            'syllabus' => 'Silabus',
            'syllabus.*.sort' => 'Urutan Silabus',
            'syllabus.*.title' => 'Judul Silabus',
            'syllabus.*.video' => 'Link Video Silabus',
            'is_favourite' => 'Favorit',
            'is_free' => 'Gratis',
            'price' => 'Harga Kelas',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa file dengan format: :values',
            'max' => ':attribute tidak boleh lebih dari :max KB',
            'string' => ':attribute harus berupa teks',
            'integer' => ':attribute harus berupa angka',
            'boolean' => ':attribute harus berupa boolean',
            'exists' => ':attribute tidak ditemukan',
            'unique' => ':attribute sudah digunakan',
            'array' => ':attribute harus berupa array',
            'regex' => ':attribute harus berupa link YouTube yang valid',
            'boolean' => ':attribute harus berupa nilai boolean',
        ];
    }
}
