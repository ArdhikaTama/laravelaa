
@extends('layouts.app')

@section('title', 'Data Mahasiswa - SIAKAD')

@section('content')
    <h1>Data Mahasiswa</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: #c62828; margin-bottom: 15px;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <a href="{{ route('mahasiswa.create') }}"
       style="display:inline-block; background:#203e88; color:white;
              padding:9px 13px; border-radius:3px; text-decoration:none;
              font-size:13px; margin-bottom:15px;">
        + Tambah Mahasiswa
    </a>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs['nim'] }}</td>
                        <td>{{ $mhs['nama'] }}</td>
                        <td>{{ $mhs['prodi'] }}</td>
                        <td>{{ $mhs['angkatan'] }}</td>
                        <td>
                            <form action="{{ route('mahasiswa.destroy', $mhs['nim']) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    style="background:#e63946; color:white; border:0;
                                           padding:6px 10px; border-radius:3px;
                                           cursor:pointer; font-size:12px;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
