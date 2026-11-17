<?php

namespace App\Http\Controllers;

class DosenController extends Controller
{
    public function tampil()
    {
        $dosen = [
            [
                'nidn' => '0312345678',
                'nama' => 'Ahmad Wijaya',
                'prodi' => 'Teknik Informatika',
                'email' => 'ahmad@example.com',
            ],
            [
                'nidn' => '0312345679',
                'nama' => 'Siti Rahmawati',
                'prodi' => 'Sistem Informasi',
                'email' => 'siti@example.com',
            ],
            [
                'nidn' => '0312345680',
                'nama' => 'Rudi Hartono',
                'prodi' => 'Teknik Komputer',
                'email' => 'rudi@example.com',
            ],
        ];

        return view('tampildosen', compact('dosen'));
    }
}
