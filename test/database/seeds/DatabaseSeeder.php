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
        if (Schema::hasTable('provinces')) {
            if (DB::table('provinces')->count() > 0) {
                DB::table('provinces')->truncate();
            }

            DB::table('provinces')->insert([
                [
                    'prov_name' => 'Papua',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }

        if (Schema::hasTable('cities')) {
            if (DB::table('cities')->count() > 0) {
                DB::table('cities')->truncate();
            }

            DB::table('cities')->insert([
                [
                    'city_name' => 'Nabire',
                    'prov_id'   => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'city_name' => 'Dogiyai',
                    'prov_id'   => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'city_name' => 'Deiyai',
                    'prov_id'   => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'city_name' => 'Paniai',
                    'prov_id'   => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'city_name' => 'Intan Jaya',
                    'prov_id'   => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'city_name' => 'Mimika',
                    'prov_id'   => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }
        if (Schema::hasTable('roles')) {
            if (DB::table('roles')->count() > 0) {
                DB::table('roles')->truncate();
            }

            DB::table('roles')->insert([
                [
                    'name' => 'Superadmin',
                ],
                [
                    'name' => 'Admin',
                ],
            ]);
        }

        if (Schema::hasTable('users')) {
            if (DB::table('users')->count() > 0) {
                DB::table('users')->truncate();
            }

            DB::table('users')->insert([
                [
                    'name' => 'SuperAdmin',
                    'email' => 'administrator@mail.com',
                    'password' => bcrypt('123'),
                    'profile_url' => 'admin.jpg',
                    'role_id' => 1,
                    'city_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]);
        }
    }
}
