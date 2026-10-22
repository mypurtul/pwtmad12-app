@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
<div class="form-container" style="max-width: 600px; margin: 0 auto;">
    <h2 style="margin-top: 0; margin-bottom: 20px;">Tambah Dosen Baru</h2>

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nidn">NIDN</label>
            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" placeholder="Masukkan NIDN">
            @error('nidn')
                <small style="color: #ef4444; margin-top: 5px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Dosen</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Lengkap">
            @error('nama')
                <small style="color: #ef4444; margin-top: 5px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" name="prodi" id="prodi" value="{{ old('prodi') }}" placeholder="Masukkan Program Studi">
            @error('prodi')
                <small style="color: #ef4444; margin-top: 5px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection