@extends('layouts.app')
@section('title','Data Mahasiswa')
@section('content')
<div class="mb-4"><h1 class="h3 mb-1">Data Mahasiswa</h1><p class="text-secondary mb-0">Daftar mahasiswa yang tercatat di sistem</p></div>
<div class="card border-0 shadow-sm"><div class="card-body"><div class="table-responsive"><table class="table table-striped align-middle" id="mahasiswa-table"><thead><tr><th>NIM</th><th>Nama</th><th>Program Studi</th><th>Email</th><th>No. HP</th></tr></thead><tbody>@foreach($mahasiswa as $mhs)<tr><td>{{ $mhs->nim }}</td><td>{{ $mhs->nama }}</td><td>{{ $mhs->prodi }}</td><td>{{ $mhs->email ?? '-' }}</td><td>{{ $mhs->nohp ?? '-' }}</td></tr>@endforeach</tbody></table></div>{{ $mahasiswa->links() }}</div></div>
@endsection
@push('scripts')<script>document.addEventListener('DOMContentLoaded',()=>{if(window.DataTable)new DataTable('#mahasiswa-table',{paging:false,searching:true,info:false,order:[]});});</script>@endpush
