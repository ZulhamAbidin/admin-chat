<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        DB::table('jurusan')->insert([
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'foto' => 'jurusan/01JNGK8NNX9A34F2R6K59MQX7W.jpeg',
                'deskripsi' => 'Jurusan ini berfokus pada pengembangan perangkat lunak dan aplikasi komputer. Siswa akan mempelajari pemrograman, basis data, pengujian perangkat lunak, serta pengembangan aplikasi berbasis web dan mobile.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Social Care (Keperawatan Sosial)',
                'foto' => 'jurusan/01JNGKAA48QDEXBSQZV5H5TG4M.jpeg',
                'deskripsi' => 'Jurusan ini menekankan pada pelayanan sosial dan kesehatan dasar. Siswa akan belajar tentang perawatan lansia, anak-anak, dan individu berkebutuhan khusus, serta keterampilan komunikasi dan psikologi dasar dalam merawat pasien.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Otomatisasi dan Tata Kelola Perkantoran (OTKP)',
                'foto' => 'jurusan/01JNGKBBPXGWYD34RSVZ6ACSBM.jpeg',
                'deskripsi' => 'Jurusan ini mempersiapkan siswa untuk bekerja di bidang administrasi perkantoran dengan keahlian dalam teknologi perkantoran, manajemen dokumen, serta keterampilan komunikasi bisnis.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Akuntansi dan Keuangan Lembaga',
                'foto' => 'jurusan/01JNGKDFSE0BTFGYB3ASRS3JAT.jpeg',
                'deskripsi' => 'Jurusan ini membekali siswa dengan keterampilan dalam bidang akuntansi, pengelolaan keuangan, perpajakan, serta penggunaan teknologi akuntansi modern.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
