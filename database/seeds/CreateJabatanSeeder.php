<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CreateJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            'Kepala Bidang',
            'Sekretaris Bidang',
            'Keuangan Bidang'
        ];

        for ($i = 0; $i < count($jabatan); $i++) {
            DB::table('jabatans')->insert([
                'nama_jabatan' => $jabatan[$i],

            ]);
        }
    }
}
