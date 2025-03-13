<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->document = 7500121;
        $user->name = 'John';
        $user->fullname = 'John wick';
        $user->gender = 'Male';
        $user->birthdate = '1990-05-15';
        $user->phone =  3121234565;
        $user->email = 'john.wick@example.com';
        $user->password = bcrypt('admin');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->document = 3212122;
        $user->name = 'Lara';
        $user->fullname = 'Lara bramchan';
        $user->gender = 'Female';
        $user->birthdate = '1999-05-02';
        $user->phone =  3121234565;
        $user->email = 'lara@example.com';
        $user->password = bcrypt('12345');
        $user->save();

    }
}
