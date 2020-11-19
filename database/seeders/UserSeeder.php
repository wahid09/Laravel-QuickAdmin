<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'role_id' => Role::where('slug', 'super-admin')->first()->id,
            'name' => 'Super Admin',
            'name_bn' => 'সুপার অ্যাডমিন',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => true
        ]);

        User::updateOrCreate([
            'role_id' => Role::where('slug', 'user')->first()->id,
            'name' => 'User',
            'name_bn' => 'ইউসার',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'status' => true
        ]);
    }
}
