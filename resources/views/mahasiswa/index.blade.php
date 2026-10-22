@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')

    <h1>Data Mahasiswa</h1>

    <a href="/mahasiswa/create" class="btn">
        + Tambah Mahasiswa
    </a>

    <table>

        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Semester</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($mahasiswa as $mhs)

                <tr>

                    <td>{{ $mhs['nim'] }}</td>

                    <td>{{ $mhs['nama'] }}</td>

                    <td>{{ $mhs['prodi'] }}</td>

                    <td>{{ $mhs['semester'] }}</td>

                    <td>

                        @if ($mhs['status'] == 'aktif')

                            <span class="status-aktif">
                                Aktif
                            </span>

                        @elseif ($mhs['status'] == 'cuti')

                            <span class="status-cuti">
                                Cuti
                            </span>

                        @elseif ($mhs['status'] == 'lulus')

                            <span class="status-lulus">
                                Lulus
                            </span>

                        @else

                            Status Tidak Diketahui

                        @endif

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

@endsection