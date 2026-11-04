@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="mb-4"><h1 class="h3 mb-1">Dashboard</h1><p class="text-secondary mb-0">Ringkasan data akademik</p></div>
<div class="row g-3"><div class="col-12 col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body"><div class="text-secondary">Mahasiswa</div><div class="display-5 fw-semibold">{{ $jumlahMahasiswa }}</div></div></div></div><div class="col-12 col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body"><div class="text-secondary">Dosen</div><div class="display-5 fw-semibold">{{ $jumlahDosen }}</div></div></div></div><div class="col-12 col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body"><div class="text-secondary">Mata Kuliah</div><div class="display-5 fw-semibold">{{ $jumlahMataKuliah }}</div></div></div></div></div>
@endsection
