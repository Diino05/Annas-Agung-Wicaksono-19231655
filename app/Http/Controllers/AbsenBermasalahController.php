<?php

namespace App\Http\Controllers;

use App\Models\AbsenBermasalah;
use Illuminate\Http\Request;

class AbsenBermasalahController extends Controller
{
    // Daftar pilihan dropdown
    private $petugasList = [
        'Prita Anitya Melisa',
        'Budi Santoso',
        'Siti Aminah',
        'Lainnya',
    ];

    private $lokasiList = [
        'Fatmawati A',
        'Fatmawati B',
        'Cilandak',
        'Lainnya',
    ];

    private $shiftList = [
        '1A [07:30:00 - 16:30:00] Jam Kerja Shift Pagi',
        '2B [08:00:00 - 17:00:00] Jam Kerja Shift Siang',
        '3C [19:00:00 - 07:00:00] Jam Kerja Shift Malam',
    ];

    public function index()
    {
        $data = AbsenBermasalah::latest()->paginate(10);
        return view('absens.index', compact('data'));
    }

    public function create()
    {
        return view('absens.create', [
            'petugasList' => $this->petugasList,
            'lokasiList' => $this->lokasiList,
            'shiftList' => $this->shiftList,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_keterangan'   => 'required|string',
            'keterangan'      => 'nullable|string',
            'lokasi_kampus'   => 'required|in:' . implode(',', $this->lokasiList),
            'tanggal_awal'    => 'required|date',
            'tanggal_akhir'   => 'required|date',
            'shift_kerja'     => 'required|in:' . implode(',', $this->shiftList),
            'kondisi'         => 'required|array',
            'petugas_input'   => 'required|in:' . implode(',', $this->petugasList),
        ]);
        AbsenBermasalah::create($validated);
        return redirect()->route('absens.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(AbsenBermasalah $absen)
    {
        return view('absens.edit', [
            'absen'        => $absen,
            'petugasList'  => $this->petugasList,
            'lokasiList'   => $this->lokasiList,
            'shiftList'    => $this->shiftList,
        ]);
    }

    public function update(Request $request, AbsenBermasalah $absen)
    {
        $validated = $request->validate([
            'no_keterangan'   => 'required|string',
            'keterangan'      => 'nullable|string',
            'lokasi_kampus'   => 'required|in:' . implode(',', $this->lokasiList),
            'tanggal_awal'    => 'required|date',
            'tanggal_akhir'   => 'required|date',
            'shift_kerja'     => 'required|in:' . implode(',', $this->shiftList),
            'kondisi'         => 'required|array',
            'petugas_input'   => 'required|in:' . implode(',', $this->petugasList),
        ]);
        $absen->update($validated);
        return redirect()->route('absens.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(AbsenBermasalah $absen)
    {
        $absen->delete();
        return redirect()->route('absens.index')->with('success', 'Data berhasil dihapus!');
    }
}
