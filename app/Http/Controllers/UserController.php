<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private const ROLES = ['admin', 'dosen', 'mahasiswa'];
    public function index() { $users = User::orderBy('name')->paginate(10); return view('users.index', compact('users')); }
    public function create() { return view('users.create', ['roles' => self::ROLES]); }
    public function store(Request $request) {
        $data = $request->validate(['name' => ['required','string','max:255'], 'email' => ['required','email','max:255','unique:users,email'], 'password' => ['required','string','min:8','confirmed'], 'role' => ['required',Rule::in(self::ROLES)]]);
        unset($data['password_confirmation']); User::create($data);
        return redirect()->route('users.index')->with('success','Pengguna berhasil ditambahkan.');
    }
    public function edit(User $user) { return view('users.edit', ['user'=>$user,'roles'=>self::ROLES]); }
    public function update(Request $request, User $user) {
        $data = $request->validate(['name'=>['required','string','max:255'], 'email'=>['required','email','max:255',Rule::unique('users','email')->ignore($user->id)], 'password'=>['nullable','string','min:8','confirmed'], 'role'=>['required',Rule::in(self::ROLES)]]);
        unset($data['password_confirmation']); if (blank($data['password'] ?? null)) unset($data['password']); $user->update($data);
        return redirect()->route('users.index')->with('success','Data pengguna berhasil diperbarui.');
    }
    public function destroy(User $user) { abort_if($user->is(auth()->user()),422,'Akun yang sedang digunakan tidak dapat dihapus.'); $user->delete(); return redirect()->route('users.index')->with('success','Pengguna berhasil dihapus.'); }
}
