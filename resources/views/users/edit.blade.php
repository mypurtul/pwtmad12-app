@extends('layouts.app')
@section('title','Edit Pengguna')
@section('content')
<h1 class="h3 mb-4">Edit Pengguna</h1>
<form class="card border-0 shadow-sm" method="POST" action="{{ route('users.update',$user) }}"><div class="card-body">@csrf @method('PUT')
<div class="mb-3"><label class="form-label" for="name">Nama</label><input class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}" required></div>
<div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="{{ old('email',$user->email) }}" required></div>
<div class="mb-3"><label class="form-label" for="role">Peran</label><select class="form-select" id="role" name="role" required>@foreach($roles as $role)<option value="{{ $role }}" @selected(old('role',$user->role)===$role)>{{ ucfirst($role) }}</option>@endforeach</select></div>
<p class="form-text">Kosongkan password jika tidak ingin menggantinya.</p><div class="mb-3"><label class="form-label" for="password">Password baru</label><input class="form-control" id="password" name="password" type="password" autocomplete="new-password"></div><div class="mb-3"><label class="form-label" for="password_confirmation">Konfirmasi password baru</label><input class="form-control" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"></div>
</div><div class="card-footer bg-white"><button class="btn btn-primary">Simpan Perubahan</button> <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">Batal</a></div></form>
@endsection
