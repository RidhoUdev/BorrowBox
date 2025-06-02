<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));

    }

    /**
     * Display a listing of the resource.
     */

    public function create()
    {
        return view('admin.users.create');

    }

    public function store(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|string|email|max:255|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'role' => ['required', 'string', Rule::in(['operator', 'user'])],
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Enkripsi password
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Simpan data pengguna baru
    User::create($validatedData);

    // Redirect ke halaman daftar pengguna dengan pesan sukses
    return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
}


    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Display a listing of the resource.
     */

    public function edit(string $id)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'username' => [
            'required',
            'string',
            'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
        'phone' => 'nullable|string|max:20',
        'role' => ['required', 'string', Rule::in(['operator', 'user'])],
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    if (!empty($validatedData['password'])) {
        $validatedData['password'] = Hash::make($validatedData['password']);
    } else {
        unset($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect()->route('admin.users.index')
                    ->with('success', 'User berhasil diperbarui.');
}

    public function destroy(User $user)
{

    if (Auth::id() === $user->id) {
        return redirect()->route('admin.users.index')
                        ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
    }

    $user->delete();
    return redirect()->route('admin.users.index')
                    ->with('success', 'User berhasil dihapus.');
}

}
