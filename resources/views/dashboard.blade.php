
@extends('layouts.app')

@section('title', 'Dashboard - SIAKAD')

@section('content')
    <h1>Dashboard</h1>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <h3>Mahasiswa</h3>
            <p>{{ $jumlahMahasiswa }}</p>
        </div>

        <div class="dashboard-card">
            <h3>Dosen</h3>
            <p>{{ $jumlahDosen }}</p>
        </div>

        <div class="dashboard-card">
            <h3>Mata Kuliah</h3>
            <p>{{ $jumlahMataKuliah }}</p>
        </div>
    </div>

    <style>
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .dashboard-card {
            background: #fff;
            padding: 18px 12px;
            border: 1px solid #eeeeee;
            border-radius: 5px;
            min-height: 100px;
        }

        .dashboard-card h3 {
            font-size: 13px;
            margin: 0 0 12px;
        }

        .dashboard-card p {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        @media (max-width: 600px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
