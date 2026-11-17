
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIAKAD')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f5fa;
            color: #111;
        }

        .header {
            height: 50px;
            background: #203e88;
            color: white;
            padding: 15px 25px;
            font-size: 16px;
            font-weight: bold;
        }

        .container {
            display: flex;
            min-height: calc(100vh - 50px);
        }

        .sidebar {
            width: 190px;
            flex-shrink: 0;
            background: #fff;
            padding-top: 12px;
        }

        .sidebar a {
            display: block;
            padding: 13px 20px;
            text-decoration: none;
            color: #222;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #e9edf7;
            color: #203e88;
        }

        .content {
            flex: 1;
            min-width: 0;
            padding: 28px 26px;
        }

        h1 {
            font-size: 26px;
            margin: 12px 0 22px;
        }

        .table-card {
            background: white;
            padding: 12px;
            border-radius: 6px;
            box-shadow: 0 1px 4px rgba(0,0,0,.04);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #e8e8e8;
        }

        th {
            background: #fafafa;
            font-weight: bold;
        }

        tbody tr:hover {
            background: #f8f9fc;
        }

        .back-link {
            display: inline-block;
            margin-top: 18px;
            color: #203e88;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 145px;
            }

            .sidebar a {
                padding: 12px;
            }

            .content {
                padding: 18px 12px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        SIAKAD - Sistem Informasi Akademik
    </header>

    <div class="container">
        <nav class="sidebar">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
            <a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
            <a href="{{ route('dosen.index') }}"
               class="{{ request()->is('dosen') ? 'active' : '' }}">
                Dosen
            </a>
            <a href="{{ route('matakuliah.index') }}"
               class="{{ request()->is('matakuliah') ? 'active' : '' }}">
                Mata Kuliah
            </a>
        </nav>

        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
