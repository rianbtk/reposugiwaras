<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'AdminWals',
                'status' => 'admin',
                'email' => 'adminwals@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('$2y$10$tIZQdSS4Agd/Dw6L/SEfe.jQL3avyru9TB1tDuuZeXuBWRRDn/F2i'),
                'remember_token' => 'Scj1wsC3xn4Zr4nTVmUs9aSAbPSKO5P1ACpxC0iuI3dSRUwuHja5rIfJzlrq',
                'levelid' => 0,
                'status_id' => 'Active',
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-02-10 11:12:17'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-05-31 22:55:44'),
            ],
            [
                'id' => 2,
                'name' => 'TeacherWals',
                'status' => 'teacher',
                'email' => 'teacherwals@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('$2y$10$d.MgC66ykIKEU/iramDmDOVme2bbh5O2bjG4GNb33MXa6yBPoEE5S'),
                'remember_token' => 'FrmuUhr2TEftyaNsfANYXrofIezRoxJOGZ9nH3jOSOcXm7Oudy8VJzkQpSer',
                'levelid' => 0,
                'status_id' => 'Active',
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-02-10 11:33:45'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-05-31 22:55:58'),
            ],
            [
                'id' => 3,
                'name' => 'StudentWals',
                'status' => 'student',
                'email' => 'studentwals@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('$2y$10$oh7U/uqW255g/vizBuNnJ.0o1vdX3MrU1pspvQHCVAWnLLy57WCXy'),
                'remember_token' => null,
                'levelid' => 2,
                'status_id' => 'Active',
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-19 22:38:27'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-19 22:38:27'),
            ],
            [
                'id' => 8,
                'name' => 'Anggit Agung',
                'status' => 'student',
                'email' => 'anggit@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('$2y$10$R/IkZ/0i7kRFmUeOevvtaOiIiIrw3QEqBTiSvC1uAQS7oKCzN/Di6'),
                'remember_token' => null,
                'levelid' => 2,
                'status_id' => 'Active',
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-22 20:35:48'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-22 20:35:48'),
            ],
            [
                'id' => 9,
                'name' => 'evasil',
                'status' => 'student',
                'email' => 'evasil@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('$2y$10$sjQFmjW/SZCZAGsVLheE.OgBlSCpD0LmrK5g9Hjf3/wqvqViI.mBe'),
                'remember_token' => null,
                'levelid' => 2,
                'status_id' => 'Active',
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-22 21:12:32'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-22 21:12:32'),
            ],
        ];

        // Insert data
        DB::table('users')->insert($users);
    }
}
