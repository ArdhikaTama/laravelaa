
@extends('layouts.app')

@section('title', 'Data Mata Kuliah - SIAKAD')

@section('content')
    <h1>Data Mata Kuliah</h1>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($matakuliah as $mk)
                    <tr>
                        <td>{{ $mk['kode'] }}</td>
                        <td>{{ $mk['nama'] }}</td>
                        <td>{{ $mk['sks'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="back-link" href="{{ route('dashboard') }}">
        ← Kembali ke Dashboard
    </a>
@endsection
