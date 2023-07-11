<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'pek',
                'email'     => 'pek@pek.pek',
                'password'  => Hash::make('pek')
            ],
            [
                'name'      => 'lisa',
                'email'     => 'lisa@lisa.lisa',
                'password'  => Hash::make('lisa')
            ],
            [
                'name'      => 'asdf',
                'email'     => 'asdf@asdf.asdf',
                'password'  => Hash::make('asdf')
            ],
        ];

        foreach ($users as $user_data) {
            User::create($user_data);
        }
    }
}
