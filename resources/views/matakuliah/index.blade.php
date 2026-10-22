@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')

    <h1>Data Mata Kuliah</h1>

    <table>

        <thead>
            <tr>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>SKS</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($mataKuliah as $matkul)

                <tr>

                    <td>{{ $matkul['kode'] }}</td>

                    <td>{{ $matkul['nama'] }}</td>

                    <td>{{ $matkul['sks'] }}</td>

                </tr>

            @endforeach

        </tbody>

    </table>

@endsection