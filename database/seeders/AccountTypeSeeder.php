<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert(
            [
                'accountName' => 'Konto główne',
                'accountType' => 1,
            ]
        );
        DB::table('type')->insert(
            [
                'accountName' => 'Konto oszczędnościowe',
                'accountType' => 2,
            ]
        );
    }
}