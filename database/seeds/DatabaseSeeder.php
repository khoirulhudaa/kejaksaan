<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('roles')) {
            if (DB::table('roles')->count() > 0) {
                DB::table('roles')->truncate();
            }

            DB::table('roles')->insert([
                [
                    'name' => 'Admin',
                ],
                [
                    'name' => 'Pimpinan',
                ],
                [
                    'name' => 'Operator',
                ],
                [
                    'name' => 'User',
                ],
            ]);
        }

        if (Schema::hasTable('users')) {
            if (DB::table('users')->count() > 0) {
                DB::table('users')->truncate();
            }

            DB::table('users')->insert([
                [
                    'name' => 'Admin',
                    'email' => 'administrator@mail.com',
                    'password' => bcrypt('123'),
                    'profile_url' => 'admin.jpg',
                    'role_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pimpinan',
                    'email' => 'pimpinan@mail.com',
                    'password' => bcrypt('123'),
                    'profile_url' => 'admin.jpg',
                    'role_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Operator',
                    'email' => 'operator@mail.com',
                    'password' => bcrypt('123'),
                    'profile_url' => 'admin.jpg',
                    'role_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'User',
                    'email' => 'user@mail.com',
                    'password' => bcrypt('123'),
                    'profile_url' => 'admin.jpg',
                    'role_id' => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('kecamatans')) {
            if (DB::table('kecamatans')->count() > 0) {
                DB::table('kecamatans')->truncate();
            }

            DB::table('kecamatans')->insert([
                [
                    'name' => 'Pagar Alam Utama',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pagar Alam Selatan',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Dempo Utara',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Dempo Tengah',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Dempo Selatan',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('agamas')) {
            if (DB::table('agamas')->count() > 0) {
                DB::table('agamas')->truncate();
            }

            DB::table('agamas')->insert([
                [
                    'name' => 'Islam',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Budha',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('warga_negaras')) {
            if (DB::table('warga_negaras')->count() > 0) {
                DB::table('warga_negaras')->truncate();
            }

            DB::table('warga_negaras')->insert([
                [
                    'name' => 'WNI',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'WNA',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('pendidikans')) {
            if (DB::table('pendidikans')->count() > 0) {
                DB::table('pendidikans')->truncate();
            }

            DB::table('pendidikans')->insert([
                [
                    'name' => 'SMA',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'S1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('status_perkawinans')) {
            if (DB::table('status_perkawinans')->count() > 0) {
                DB::table('status_perkawinans')->truncate();
            }

            DB::table('status_perkawinans')->insert([
                [
                    'name' => 'Kawin',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Belum Kawin',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Cerai',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('pekerjaans')) {
            if (DB::table('pekerjaans')->count() > 0) {
                DB::table('pekerjaans')->truncate();
            }

            DB::table('pekerjaans')->insert([
                [
                    'name' => 'Wiraswasta',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Programmer',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('suku_bangsas')) {
            if (DB::table('suku_bangsas')->count() > 0) {
                DB::table('suku_bangsas')->truncate();
            }

            DB::table('suku_bangsas')->insert([
                [
                    'name' => 'Sunda',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Jawa',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('negaras')) {
            if (DB::table('negaras')->count() > 0) {
                DB::table('negaras')->truncate();
            }

            DB::table('negaras')->insert([
                [
                    'name' => 'Malaysia',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Cambodia',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('tingga_sementara_w_n_a_s')) {
            if (DB::table('tingga_sementara_w_n_a_s')->count() > 0) {
                DB::table('tingga_sementara_w_n_a_s')->truncate();
            }

            DB::table('tingga_sementara_w_n_a_s')->insert([
                [
                    'name' => 'Tenaga Kerja Asing',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pelajar',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Peneliti',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Keluarga',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Rohaniawan',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('kunjungan_w_n_a_s')) {
            if (DB::table('kunjungan_w_n_a_s')->count() > 0) {
                DB::table('kunjungan_w_n_a_s')->truncate();
            }

            DB::table('kunjungan_w_n_a_s')->insert([
                [
                    'name' => 'Usaha',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sosbud',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Wisata',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }
    }
}
