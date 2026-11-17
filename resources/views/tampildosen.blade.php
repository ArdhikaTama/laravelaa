
@extends('layouts.app')

@section('title', 'Data Dosen - SIAKAD')

@section('content')
    <h1>Data Dosen</h1>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dosen as $dsn)
                    <tr>
                        <td>{{ $dsn['nidn'] }}</td>
                        <td>{{ $dsn['nama'] }}</td>
                        <td>{{ $dsn['email'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="back-link" href="{{ route('dashboard') }}">
        ← Kembali ke Dashboard
    </a>
@endsection
