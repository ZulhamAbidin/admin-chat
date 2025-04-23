<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SiswaController extends Controller
{
    public function index()
    {
        return view('lainnya.siswa');
    }

    public function data()
    {
        $siswa = Siswa::with(['jurusan', 'kelas'])->get();

        return response()->json([
            'data' => $siswa->map(function ($item, $index) {
                return [
                    'DT_RowIndex'   => $index + 1,
                    'nis'           => $item->nis,
                    'nama'          => $item->nama,
                    'alamat'        => $item->alamat,
                    'tanggal_lahir' => Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y'),
                    'jurusan'       => $item->jurusan->nama ?? '-',
                    'kelas'         => $item->kelas->nama ?? '-',
                ];
            }),
        ]);
    }
}
