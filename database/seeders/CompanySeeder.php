<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'company_name' => Str::random(8),
            'company_city' => Str::random(10)
        ]);

        foreach (range(1,3) as $index) {
            DB::table('contacts')->insert([
                'company_id' => Company::all()->random()->id,
                'number' => mt_rand(10000000,99999999)
            ]);
        }   
    }
}
