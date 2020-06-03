<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name' => env('SEEDER_NAME'),
            'email' => env('SEEDER_EMAIL'),
            'password' => bcrypt(env('SEEDER_PASSWORD'))
        ]);
    }
}
