@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')

    <h1>Tambah Mahasiswa</h1>

    <div class="form-container">

        <form action="#" method="POST">

            <div class="form-group">
                <label for="nim">NIM</label>
                <input
                    type="text"
                    id="nim"
                    name="nim"
                    placeholder="Masukkan NIM"
                >
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama mahasiswa"
                >
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Masukkan program studi"
                >
            </div>

            <div class="form-group">
                <label for="semester">Semester</label>
                <input
                    type="number"
                    id="semester"
                    name="semester"
                    placeholder="Masukkan semester"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email"
                >
            </div>

            <button type="submit" class="btn">
                Simpan
            </button>

        </form>

    </div>

@endsection