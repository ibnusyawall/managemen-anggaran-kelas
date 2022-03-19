<?php

namespace Database\Seeders;

use App\Models\UangMasuk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            UserSeeder::class,
            UangMasukSeeder::class,
            UangKeluarSeeder::class,
        ];

        $this->call($seeds);
    }
}
