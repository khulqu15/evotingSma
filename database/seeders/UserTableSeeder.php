<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Panitia';
        $user->email = 'evoting@smanesa.sch.id';
        $user->password = 'secretservice';
        $user->api_token = Str::random(25);
        $user->save();
    }
}
