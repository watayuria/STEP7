<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('companies')->insert([
            'id' => '1',
            'company_name' => 'A Co.Ltd',
            'street_address' => 'Tokyo',
            'representative_name' => 'Tanaka',
        ]);

        \DB::table('companies')->insert([
            'id' => '2',
            'company_name' => 'B Co.Ltd',
            'street_address' => 'Nagoya',
            'representative_name' => 'Yamada',
        ]);

        \DB::table('companies')->insert([
            'id' => '3',
            'company_name' => 'C Co.Ltd',
            'street_address' => 'Osaka',
            'representative_name' => 'Suzuki',
        ]);

        \DB::table('companies')->insert([
            'id' => '4',
            'company_name' => 'D Co.Ltd',
            'street_address' => 'Fukuoka',
            'representative_name' => 'Sato',
        ]);
    }
}
