@extends('layouts.app')
@section('title','Data Mata Kuliah')
@section('content')
<div class="mb-4"><h1 class="h3 mb-1">Data Mata Kuliah</h1><p class="text-secondary mb-0">Daftar mata kuliah beserta dosen pengampu</p></div>
<div class="card border-0 shadow-sm"><div class="card-body"><div class="table-responsive"><table class="table table-striped align-middle" id="matakuliah-table"><thead><tr><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Dosen Pengampu</th></tr></thead><tbody>@foreach($mataKuliah as $matkul)<tr><td>{{ $matkul->kode }}</td><td>{{ $matkul->nama }}</td><td>{{ $matkul->sks }}</td><td>{{ $matkul->dosen?->nama ?? '-' }}</td></tr>@endforeach</tbody></table></div></div></div>
@endsection
@push('scripts')<script>document.addEventListener('DOMContentLoaded',()=>{if(window.DataTable)new DataTable('#matakuliah-table',{pageLength:10,searching:true,order:[]});});</script>@endpush
