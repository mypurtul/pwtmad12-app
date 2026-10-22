@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
<div class="form-container" style="max-width: 600px; margin: 0 auto;">
    <h2 style="margin-top: 0; margin-bottom: 20px;">Edit Data Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nidn">NIDN</label>
            <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $dosen->nidn) }}">
            @error('nidn')
                <small style="color: #ef4444; margin-top: 5px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Dosen</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}">
            @error('nama')
                <small style="color: #ef4444; margin-top: 5px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" name="prodi" id="prodi" value="{{ old('prodi', $dosen->prodi) }}">
            @error('prodi')
                <small style="color: #ef4444; margin-top: 5px; display: block;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" class="btn">Perbarui</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection