@extends('layouts.app')
@section('title','Kelola Pengguna')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4"><div><h1 class="h3 mb-1">Kelola Pengguna</h1><p class="text-secondary mb-0">Akun dan peran akses aplikasi</p></div><a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a></div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card border-0 shadow-sm"><div class="card-body"><div class="table-responsive"><table class="table table-striped align-middle" id="users-table"><thead><tr><th>Nama</th><th>Email</th><th>Peran</th><th>Aksi</th></tr></thead><tbody>@foreach($users as $user)<tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td><span class="badge text-bg-secondary">{{ ucfirst($user->role) }}</span></td><td><a class="btn btn-sm btn-outline-primary" href="{{ route('users.edit',$user) }}">Edit</a>@if(!$user->is(auth()->user()))<form class="d-inline" method="POST" action="{{ route('users.destroy',$user) }}" onsubmit="return confirm('Hapus akun ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form>@endif</td></tr>@endforeach</tbody></table></div>{{ $users->links() }}</div></div>
@endsection
@push('scripts')<script>document.addEventListener('DOMContentLoaded',()=>{if(window.DataTable)new DataTable('#users-table',{paging:false,searching:true,info:false,order:[]});});</script>@endpush
