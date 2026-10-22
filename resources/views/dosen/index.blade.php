@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div>
        <h2 style="margin: 0;">Data Dosen</h2>
        <p style="margin: 5px 0 0; color: #666;">Daftar dosen Program Studi</p>
    </div>
    <a href="{{ route('dosen.create') }}" class="btn">Tambah Dosen</a>
</div>

@if(session('success'))
    <div style="padding: 12px; background: #d1fae5; color: #065f46; border-radius: 5px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<!-- Form Search, Filter, dan Sorting -->
<form action="{{ route('dosen.index') }}" method="GET" class="filter-box">
    <div class="filter-item" style="flex: 2;">
        <label>Cari dosen</label>
        <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari NIDN, nama, prodi">
    </div>

    <div class="filter-item">
        <label>Filter program studi</label>
        <select name="prodi">
            <option value="">Semua prodi</option>
            @foreach ($programStudi as $namaProdi)
                <option value="{{ $namaProdi }}" @selected(request('prodi') === $namaProdi)>{{ $namaProdi }}</option>
            @endforeach
        </select>
    </div>

    <div class="filter-item">
        <label>Urutkan berdasarkan</label>
        <select name="sort">
            @foreach ($sortOptions as $column => $label)
                <option value="{{ $column }}" @selected($sort === $column)>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="filter-item">
        <label>Urutan</label>
        <select name="direction">
            <option value="asc" @selected($direction === 'asc')>A-Z / Naik</option>
            <option value="desc" @selected($direction === 'desc')>Z-A / Turun</option>
        </select>
    </div>

    <div style="display: flex; gap: 5px;">
        <button type="submit" class="btn">Cari</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<!-- Tabel Data Dosen -->
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Program Studi</th>
            <th>Mata Kuliah Diampu</th>
            <th style="width: 140px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dosen as $d)
            <tr>
                <td>{{ $loop->iteration + $dosen->firstItem() - 1 }}</td>
                <td>{{ $d->nidn }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->prodi }}</td>
                <td>
                    @forelse($d->mataKuliah as $mk)
                        <div>• {{ $mk->kode }} - {{ $mk->nama }}</div>
                    @empty
                        <span style="color: #999; font-size: 13px;">Belum ada mata kuliah</span>
                    @endforelse
                </td>
                <td>
                    <a href="{{ route('dosen.edit', $d->id) }}" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                    <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center; color: #999; padding: 20px;">Data dosen tidak ditemukan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
@if ($dosen->hasPages())
    <div style="margin-top: 20px;">
        {{ $dosen->links() }}
    </div>
@endif
@endsection