<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(array(
            'name'=>'Mike',
            'email'=>'mike@test.eu',
            'password'=>Hash::make('testtest'),
            'role'=>'user',
        ));

        User::firstOrCreate(array(
            'name'=>'bob',
            'email'=>'bob@test.eu',
            'password'=>Hash::make('testtest'),
            'role'=>'user',
        ));

        User::firstOrCreate(array(
            'name'=>'Joel',
            'email'=>'Joel@test.eu',
            'password'=>Hash::make('testtest'),
            'role'=>'user',
        ));

        User::firstOrCreate(array(
            'name'=>'admin',
            'email'=>'admin@test.eu',
            'password'=>Hash::make('testtest'),
            'role'=>'admin',
        ));

    }
}
