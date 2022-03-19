<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UangKeluarSeeder extends Seeder
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
                'keperluan' => 'Beli Sapu',
                'nominal' => 20000,
                'tanggal' => '2022-01-13'
            ],
            [
                'keperluan' => 'Beli Pel',
                'nominal' => 30000,
                'tanggal' => '2022-01-15'
            ],
            [
                'keperluan' => 'Jenguk temen',
                'nominal' => 50000,
                'tanggal' => '2022-01-23'
            ]
        ];

        foreach($uangMasuk as $v) {
            DB::table('uang_keluars')->insert($v);
        }
    }
}
