<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    // =========================
    // DATA AWAL WEB
    // =========================
    private function dataAwal()
    {
        return [
            [
                'nim' => '21115001',
                'nama' => 'Budi Santoso',
                'prodi' => 'Teknik Informatika',
                'angkatan' => 2021,
            ],
            [
                'nim' => '21115002',
                'nama' => 'Siti Aminah',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2021,
            ],
        ];
    }

    // =========================
    // WEB: MENAMPILKAN MAHASISWA
    // =========================
    public function index()
    {
        $mahasiswa = session('mahasiswa', $this->dataAwal());

        return view('mahasiswa', compact('mahasiswa'));
    }

    // =========================
    // WEB: FORM TAMBAH MAHASISWA
    // =========================
    public function create()
    {
        return view('mahasiswa.create');
    }

    // =========================
    // API GET: SEMUA MAHASISWA
    // =========================
    public function apiIndex()
    {
        $mahasiswa = DB::table('mahasiswa')->get();

        return response()->json([
            'message' => 'Data mahasiswa berhasil diambil.',
            'data' => $mahasiswa
        ], 200);
    }

    // =========================
    // POST: TAMBAH MAHASISWA
    // WEB DAN API
    // =========================
    public function store(Request $request)
    {
        // API POST
        if ($request->is('api/*')) {

            $validated = $request->validate([
                'nim' => 'required|string|max:20',
                'nama' => 'required|string|max:100',
                'prodi' => 'required|string|max:100',
                'email' => 'nullable|email|max:100',
                'nohp' => 'nullable|string|max:20',
            ]);

            // Cek NIM duplikat
            if (DB::table('mahasiswa')
                ->where('nim', $validated['nim'])
                ->exists()) {

                return response()->json([
                    'message' => 'NIM sudah terdaftar.'
                ], 409);
            }

            $validated['created_at'] = now();
            $validated['updated_at'] = now();

            DB::table('mahasiswa')->insert($validated);

            return response()->json([
                'message' => 'Mahasiswa berhasil ditambahkan.',
                'data' => $validated
            ], 201);
        }

        // WEB FORM
        $validated = $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'prodi' => 'required|in:Teknik Informatika,Sistem Informasi,Teknik Komputer',
            'angkatan' => 'required|integer|min:2000|max:2100',
        ]);

        $mahasiswa = session('mahasiswa', $this->dataAwal());

        if (collect($mahasiswa)->contains('nim', $validated['nim'])) {
            return back()
                ->withErrors(['nim' => 'NIM sudah terdaftar.'])
                ->withInput();
        }

        $mahasiswa[] = $validated;

        session(['mahasiswa' => $mahasiswa]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // =========================
    // API PUT: UPDATE MAHASISWA
    // =========================
    public function apiUpdate(Request $request, $nim)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'nohp' => 'nullable|string|max:20',
        ]);

        // Cari mahasiswa berdasarkan NIM
        $mahasiswa = DB::table('mahasiswa')
            ->where('nim', $nim)
            ->first();

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan.'
            ], 404);
        }

        // Update data
        DB::table('mahasiswa')
            ->where('nim', $nim)
            ->update([
                'nama' => $validated['nama'],
                'prodi' => $validated['prodi'],
                'email' => $validated['email'] ?? null,
                'nohp' => $validated['nohp'] ?? null,
                'updated_at' => now(),
            ]);

        return response()->json([
            'message' => 'Data mahasiswa berhasil diperbarui.'
        ], 200);
    }

    // =========================
    // API DELETE: HAPUS MAHASISWA
    // =========================
    public function apiDestroy($nim)
    {
        $mahasiswa = DB::table('mahasiswa')
            ->where('nim', $nim)
            ->first();

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan.'
            ], 404);
        }

        DB::table('mahasiswa')
            ->where('nim', $nim)
            ->delete();

        return response()->json([
            'message' => 'Mahasiswa berhasil dihapus.'
        ], 200);
    }

    // =========================
    // WEB DELETE: HAPUS MAHASISWA
    // =========================
    public function destroy($nim)
    {
        $mahasiswa = session('mahasiswa', $this->dataAwal());

        $mahasiswa = array_values(array_filter(
            $mahasiswa,
            fn ($mhs) => $mhs['nim'] !== $nim
        ));

        session(['mahasiswa' => $mahasiswa]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}

