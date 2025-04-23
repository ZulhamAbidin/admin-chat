<?php

namespace Database\Seeders;

use App\Models\Pelanggaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggaran::insert([
            ['jenis' => 'Terlambat Masuk Sekolah', 'deskripsi' => 'Datang setelah jam masuk sekolah.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Tidak Memakai Seragam Lengkap', 'deskripsi' => 'Tidak mengenakan seragam sesuai aturan.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Merokok di Area Sekolah', 'deskripsi' => 'Ketahuan merokok di lingkungan sekolah.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Membawa Barang Terlarang', 'deskripsi' => 'Membawa barang terlarang seperti vape atau senjata tajam.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Bolos Tanpa Izin', 'deskripsi' => 'Tidak masuk kelas tanpa alasan yang jelas.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Berbicara Kasar atau Menghina', 'deskripsi' => 'Menggunakan kata-kata kasar atau menghina guru dan teman.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Berkelahi di Sekolah', 'deskripsi' => 'Terlibat dalam perkelahian di lingkungan sekolah.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Merusak Fasilitas Sekolah', 'deskripsi' => 'Merusak bangunan, meja, kursi, atau fasilitas lainnya.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Mencuri Barang Teman atau Sekolah', 'deskripsi' => 'Mengambil barang tanpa izin.', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Menyebarkan Hoaks atau Fitnah', 'deskripsi' => 'Menyebarkan berita bohong yang merugikan sekolah atau teman.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
