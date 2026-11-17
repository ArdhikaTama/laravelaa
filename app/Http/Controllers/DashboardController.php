<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = 120;
        $jumlahDosen = 35;
        $jumlahMataKuliah = 25;

        return view('dashboard', compact(
            'jumlahMahasiswa',
            'jumlahDosen',
            'jumlahMataKuliah'
        ));
    }
}
