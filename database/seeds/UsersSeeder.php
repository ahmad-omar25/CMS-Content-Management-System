<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahmed Omar',
            'email' => 'ahmad.eltaher25@gmail.com',
            'mobile' => '01119926163',
            'password' => bcrypt('1191993')
        ]);
    }
}
