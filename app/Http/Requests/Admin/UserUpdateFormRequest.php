<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateFormRequest extends FormRequest
{
    public function rules(): array
    {
        $userId = $this->route('user')->id;

        return [
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($userId)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'phone' => ['nullable', 'string', 'max:20', Rule::unique('users')->ignore($userId)],
            'role' => ['required', 'string', Rule::in(['operator', 'user'])],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama lengkap tidak boleh lebih dari 255 karakter.',
            'name.min' => 'Nama lengkap tidak boleh kurang dari 3 karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username ini sudah digunakan.',
            'username.min' => 'Username tidak boleh kurang dari 3 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email ini sudah digunakan.',
            'email.max' => 'Alamat email tidak boleh lebih dari 255 karakter.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter.',
            'phone.min' => 'Nomor telepon tidak kurang dari 12 karakter.',
            'phone.unique' => 'Nomor telepon ini sudah digunakan.',
            'role.required' => 'Peran (role) wajib dipilih.',
            'role.in' => 'Peran (role) yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ];
    }

}
