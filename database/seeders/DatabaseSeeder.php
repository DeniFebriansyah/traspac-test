<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Alamat;
use App\Models\Pegawai;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nip' => '1',
            'name' => 'Super Admin',
            'password' => Hash::make('asd'),
            'role' => 'admin',
        ]);
        $faker = Faker::create('id_ID');
        $unitKerjaList = [
            'Dinas Pendidikan',
            'Dinas Kesehatan',
            'Dinas Pekerjaan Umum',
            'Dinas Sosial',
            'Dinas Kebudayaan',
            'Dinas Pariwisata',
            'Dinas Perindustrian',
            'Dinas Pertanian',
            'Dinas Perhubungan',
            'Dinas Pemuda dan Olahraga'
        ];
        // Loop untuk membuat 30 data
        for ($i = 0; $i < 30; $i++) {
            // Membuat data untuk tabel profile
            $profile = Profile::create([
                'nip' => $faker->unique()->numerify('##########'), // 10-digit unique NIP
                'nama' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2000-12-31'),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'photo'=>null
            ]);

            // Membuat data untuk tabel pegawai dengan foreign key `nip` yang sama
            Pegawai::create([
                'nip' => $profile->nip,
                'golongan' => $faker->randomElement(['I/a', 'I/b', 'II/a', 'II/b', 'III/a', 'III/b', 'IV/a']),
                'eselon' => $faker->randomElement(['I', 'II', 'III', 'IV', 'V']),
                'jabatan' => $faker->jobTitle,
                'tempat_tugas' => $faker->city,
                'unit_kerja' => $faker->randomElement($unitKerjaList),
                'npwp' => $faker->numerify('###############'),
            ]);

            // Membuat data untuk tabel alamat dengan foreign key `nip` yang sama
            Alamat::create([
                'nip' => $profile->nip,
                'alamat' => $faker->address,
                'no_hp' => $faker->numerify('08##########'),
            ]);
        }
    }
}