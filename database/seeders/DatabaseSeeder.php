<?php

namespace Database\Seeders;
use App\Models\Company;
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
        // \App\Models\User::factory(10)->create();
        for ($i = 1; $i <= 1; $i++) {
            $this->call(CompanySeeder::class);
        }
        
    }
}
