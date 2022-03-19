<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uangMasuk = [
            [
                'nominal' => 120000,
                'tanggal' => '2022-01-12'
            ],
            [
                'nominal' => 140000,
                'tanggal' => '2022-01-19'
            ],
            [
                'nominal' => 90000,
                'tanggal' => '2022-01-26'
            ]
        ];

        foreach($uangMasuk as $v) {
            DB::table('uang_masuks')->insert($v);
        }
    }
}
