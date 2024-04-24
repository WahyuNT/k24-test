<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'id' => 1,
                'foto' => '1713964409_monkey-artwork-illustration-on-light-sky-background-free-vector.jpg',
                'name' => 'Mone',
                'email' => 'mone@gmail.com',
                'no_hp' => '123',
                'no_ktp' => '1234',
                'tanggal_lahir' => '2024-04-02',
                'jenis_kelamin' => 'L',
                'password' => '123456',
                'created_at' => Carbon::now(),
                'updated_at' => '2024-04-24 06:19:13',
            ],
            [
                'id' => 4,
                'foto' => '1713964714_ava3.jpg',
                'name' => 'Rama',
                'email' => 'rama@gmail.com',
                'no_hp' => '12345',
                'no_ktp' => '12356',
                'tanggal_lahir' => '2024-02-12',
                'jenis_kelamin' => 'L',
                'password' => '222',
                'created_at' => Carbon::now(),
                'updated_at' => '2024-04-24 06:19:35',
            ],
           
            [
                'id' => 5,
                'foto' => '1713964703_ava4.jpeg',
                'name' => 'Asa',
                'email' => 'asa@gmail.com',
                'no_hp' => '12343534',
                'no_ktp' => '12334534',
                'tanggal_lahir' => '2024-03-02',
                'jenis_kelamin' => 'P',
                'password' => '222',
                'created_at' => Carbon::now(),
                'updated_at' => '2024-04-24 06:19:48',
            ],
          
            [
                'id' => 16,
                'foto' => '1713964725_ava.png',
                'name' => 'Raka',
                'email' => 'raka@gmail.com',
                'no_hp' => '234322',
                'no_ktp' => '2423',
                'tanggal_lahir' => '2022-01-04',
                'jenis_kelamin' => 'P',
                'password' => '123456',
                'created_at' => Carbon::now(),
                'updated_at' => '2024-04-24 06:20:17',
            ],
        ]);


        DB::table('admins')->insert([
            [
                'id' => 1,
                'foto' => 'admin1.png',
                'nama_lengkap' => 'admin',
                'username' => 'admin',
                'password' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => '2024-04-24 04:58:16',
            ],
          
        ]);
    
    }
}
