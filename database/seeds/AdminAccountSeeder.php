<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminAccountSeeder extends Seeder
{
    const ADMIN_EMAIL = 'admin@threads.com';

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        User::where('email', self::ADMIN_EMAIL)->delete();
        $admin = User::create([
            'email' => self::ADMIN_EMAIL,
            'password' => Hash::make('admin'),
        ]);

        $admin->assignRole('admin');
    }
}
