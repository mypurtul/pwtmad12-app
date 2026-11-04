@extends('layouts.app')
@section('title','Tambah Pengguna')
@section('content')
<h1 class="h3 mb-4">Tambah Pengguna</h1>
<form class="card border-0 shadow-sm" method="POST" action="{{ route('users.store') }}"><div class="card-body">@csrf
<div class="mb-3"><label class="form-label" for="name">Nama</label><input class="form-control" id="name" name="name" value="{{ old('name') }}" required>@error('name')<div class="text-danger small">{{ $message }}</div>@enderror</div>
<div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required>@error('email')<div class="text-danger small">{{ $message }}</div>@enderror</div>
<div class="mb-3"><label class="form-label" for="role">Peran</label><select class="form-select" id="role" name="role" required>@foreach($roles as $role)<option value="{{ $role }}" @selected(old('role')===$role)>{{ ucfirst($role) }}</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label" for="password">Password (minimal 8 karakter)</label><input class="form-control" id="password" name="password" type="password" required autocomplete="new-password"></div>
<div class="mb-3"><label class="form-label" for="password_confirmation">Konfirmasi password</label><input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"></div>
</div><div class="card-footer bg-white"><button class="btn btn-primary">Simpan</button> <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">Batal</a></div></form>
@endsection
