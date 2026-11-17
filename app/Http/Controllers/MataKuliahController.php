<?php

namespace App\Http\Controllers;

class MataKuliahController extends Controller
{
    public function tampil()
    {
        $matakuliah = [
            [
                'kode' => 'PG184',
                'nama' => 'Pemrograman Web Tingkat Mahir',
                'sks' => 3,
            ],
            [
                'kode' => 'BD102',
                'nama' => 'Basis Data',
                'sks' => 3,
            ],
        ];

        return view('tampilmatakuliah', compact('matakuliah'));
    }
}
