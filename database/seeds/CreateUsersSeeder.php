<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'name' => 'Eko Fredy',
                'nip' => "12345678",
                'email' => 'eko_fredy@gmail.com',
                'no_hp' => '082226832896',
                'password' => Hash::make('eko123'),
                'kode_jabatan' => "1",
                'profil' => "default_profile.png",
                'is_admin' => '1',

            ],

            [

                'name' => 'Vira',
                'nip' => "12345678",
                'email' => 'vira@gmail.com',
                'no_hp' => '082226832896',
                'password' => Hash::make('vira123'),
                'kode_jabatan' => "1",
                'profil' => "default_profile.png",
                'is_admin' => '0',

            ],

        ];



        foreach ($user as $key => $value) {

            User::create($value);
        }
    }
}
