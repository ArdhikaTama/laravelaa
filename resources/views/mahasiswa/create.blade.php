
@extends('layouts.app')

@section('title', 'Tambah Mahasiswa - SIAKAD')

@section('content')
    <h1>Form Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div style="color:#c62828; margin-bottom:15px;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div style="background:white; padding:16px; border-radius:6px;
                max-width:520px; box-shadow:0 1px 4px rgba(0,0,0,.04);">

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            <label for="nim"
                style="display:block; font-size:13px; font-weight:bold; margin-bottom:6px;">
                NIM
            </label>
            <input id="nim" name="nim" type="text"
                value="{{ old('nim') }}"
                placeholder="Masukkan NIM" required
                style="width:100%; padding:9px; border:1px solid #ddd;
                       border-radius:3px; margin-bottom:13px;">

            <label for="nama"
                style="display:block; font-size:13px; font-weight:bold; margin-bottom:6px;">
                Nama Lengkap
            </label>
            <input id="nama" name="nama" type="text"
                value="{{ old('nama') }}"
                placeholder="Masukkan Nama Lengkap" required
                style="width:100%; padding:9px; border:1px solid #ddd;
                       border-radius:3px; margin-bottom:13px;">

            <label for="prodi"
                style="display:block; font-size:13px; font-weight:bold; margin-bottom:6px;">
                Program Studi
            </label>
            <select id="prodi" name="prodi" required
                style="width:100%; padding:9px; border:1px solid #ddd;
                       border-radius:3px; background:white; margin-bottom:13px;">
                <option value="">-- Pilih Program Studi --</option>
                <option value="Teknik Informatika"
                    @selected(old('prodi') == 'Teknik Informatika')>
                    Teknik Informatika
                </option>
                <option value="Sistem Informasi"
                    @selected(old('prodi') == 'Sistem Informasi')>
                    Sistem Informasi
                </option>
                <option value="Teknik Komputer"
                    @selected(old('prodi') == 'Teknik Komputer')>
                    Teknik Komputer
                </option>
            </select>

            <label for="angkatan"
                style="display:block; font-size:13px; font-weight:bold; margin-bottom:6px;">
                Angkatan
            </label>
            <input id="angkatan" name="angkatan" type="number"
                value="{{ old('angkatan') }}"
                placeholder="Masukkan Angkatan" min="2000" max="2100" required
                style="width:100%; padding:9px; border:1px solid #ddd;
                       border-radius:3px; margin-bottom:15px;">

            <button type="submit"
                style="background:#203e88; color:white; border:0;
                       padding:9px 14px; border-radius:3px; cursor:pointer;">
                Simpan Data
            </button>
        </form>
    </div>
@endsection
