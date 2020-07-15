<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberPelaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sumber_pelaporan = [
            'Website',
            'Email',
            'Twitter',
            'Facebook',
            'Youtube',
            'Instagram',
            'lain-lain',
        ];

        for ($i = 0; $i < count($sumber_pelaporan); $i++) {
            DB::table('sumber_pelaporans')->insert([
                "sumber_pelaporan" => $sumber_pelaporan[$i],

            ]);
        }
    }
}
